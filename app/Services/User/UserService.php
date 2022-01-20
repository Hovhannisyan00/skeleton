<?php

namespace App\Services\User;

use App\Contracts\Role\IRoleRepository;
use App\Repositories\User\UserRepository;
use App\Services\BaseService;
use App\Services\File\FileService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services\User
 */
class UserService extends BaseService
{
    /**
     * @var IRoleRepository
     */
    protected $roleRepository;

    /**
     * @var FileService
     */
    protected $fileService;

    /**
     * UserService constructor.
     *
     * @param UserRepository $repository
     * @param IRoleRepository $roleRepository
     * @param FileService $fileService
     */
    public function __construct(
        UserRepository $repository,
        IRoleRepository $roleRepository,
        FileService $fileService
    )
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
        $this->fileService = $fileService;
    }

    /**
     * Function to create or update user
     *
     * @param $data
     * @param int|null $id
     * @return Model
     */
    public function createOrUpdate($data, int $id = null): Model
    {
        $data['password'] = Hash::make($data['password']);

        return DB::transaction(function () use ($id, $data) {
            $user = $id ? $this->repository->update($id, $data) : $this->repository->create($data);
            $user->assignRole($data['role_ids']);

            $this->fileService->storeFile($user, $data);

            return $user;
        });
    }

    /**
     * Function to return view data
     *
     * @param int|null $id
     * @return array
     */
    public function getViewData(int $id = null): array
    {
        if ($id) {
            $user = $this->repository->find($id);
            $userRoleIds = $user->roles->pluck('id')->all();
        }

        return [
            'roles' => $this->roleRepository->getForSelect(),
            'user' => $user ?? $this->repository->getInstance(),
            'userRoleIds' => $userRoleIds ?? null,
        ];
    }
}
