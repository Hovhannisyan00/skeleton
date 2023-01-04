<?php

namespace App\Repositories\User;

use App\Contracts\User\IUserRepository;
use App\Models\User\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements IUserRepository
{
    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
