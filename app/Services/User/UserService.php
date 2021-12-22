<?php

namespace App\Services\User;

use App\Contracts\Role\IRoleRepository;
use App\Repositories\User\UserRepository;
use App\Services\BaseService;
use App\Services\File\FileService;
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
        UserRepository          $repository,
        IRoleRepository         $roleRepository,
        FileService             $fileService
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
     */
    public function createOrUpdate($data, int $id = null)
    {
        $data['password'] = Hash::make($data['password']);

        DB::transaction(function () use($id, $data) {
            $user = $id ? $this->repository->update($id, $data) : $this->repository->create($data);
            $user->assignRole($data['role_ids']);

            $this->fileService->storeFile($user, $data, config('files.user'));
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
            'user' => $user ?? null,
            'userRoleIds' => $userRoleIds ?? null,
            'userResearchAreaIds' => $userResearchAreaIds ?? null,
        ];
    }

    /**
     * Function to delete user
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $user = $this->repository->find($id);
        $this->fileService->deleteModelFile($user);
        $this->repository->destroy($id);
    }
}
