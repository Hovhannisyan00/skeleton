<?php

namespace App\Repositories\User;

use App\Contracts\User\IUserRepository;
use App\Models\User\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository extends BaseRepository implements IUserRepository
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
