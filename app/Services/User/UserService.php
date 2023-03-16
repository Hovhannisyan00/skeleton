<?php

namespace App\Services\User;

use App\Contracts\Role\IRoleRepository;
use App\Contracts\User\IUserRepository;
use App\Services\BaseService;
use App\Services\File\FileTempService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function __construct(
        IUserRepository           $repository,
        FileTempService           $fileService,
        protected IRoleRepository $roleRepository
    ) {
        $this->repository = $repository;
        $this->fileService = $fileService;
    }

    /**
     * Function to create or update user
     */
    public function createOrUpdate($data, int $id = null): Model
    {
        $data['password'] = Hash::make($data['password']);

        return DB::transaction(function () use ($id, $data) {
            $user = $id ? $this->repository->update($id, $data) : $this->repository->create($data);
            $user->syncRoles($data['role_ids']);

            $this->fileService->storeFile($user, $data);

            return $user;
        });
    }

    /**
     * Function to return view data
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
