<?php

namespace App\Models\User;

use App\Files\HasFileData;
use App\Models\Base\ModelHelperFunctions;
use App\Models\File\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Models\User
 */
class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasRoles,
        ModelHelperFunctions,
        HasFileData;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'timezone',
        'email_notification',
        'email_reminder',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:d.m.Y',
    ];

    /**
     * Function to set model files config name
     *
     * @return string
     */
    public function setFileConfigName(): string
    {
        return self::getClassName();
    }

    /**
     * Function to return user all files
     *
     * @param null $fieldName
     * @param null $fileType
     * @return MorphMany
     */
    public function files($fieldName = null, $fileType = null): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')
            ->when($fieldName, function ($query) use ($fieldName) {
                $query->where('field_name', $fieldName);
            })
            ->when($fileType, function ($query) use ($fileType) {
                $query->where('file_type', $fileType);
            });
    }

    /**
     * Function to return user signature
     *
     * @return Model
     */
    public function getSignatureAttribute(): ?Model
    {
        return $this->files('signature')->first();
    }

    /**
     * Function to return user name
     *
     * @return string
     */
    public function name(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
