<?php

namespace App\Macros;

use App\Models\Base\BaseModel;

/**
 * Class BluePrintMacros
 * @package App\Macros
 */
class BluePrintMacros
{
    /**
     * Function to set user info
     *
     * @return \Closure
     */
    public function userInfo()
    {
        return function () {
            $this->unsignedBigInteger('created_user_id')->nullable();
            $this->string('created_user_ip')->nullable();

            $this->unsignedBigInteger('updated_user_id')->nullable();
            $this->string('updated_user_ip')->nullable();

            $this->unsignedBigInteger('deleted_user_id')->nullable();
            $this->string('deleted_user_ip')->nullable();
        };
    }

    /**
     * Function to set show status
     *
     * @return \Closure
     */
    public function showStatus()
    {
        return function () {
            $this->enum('show_status', BaseModel::SHOW_STATUSES)->default(BaseModel::SHOW_STATUS_ACTIVE);
        };
    }

    /**
     * Function to set sort order
     *
     * @return \Closure
     */
    public function sortOrder()
    {
        return function () {
            $this->integer('sort_order')->nullable();
        };
    }
}
