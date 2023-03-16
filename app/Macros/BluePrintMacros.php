<?php

namespace App\Macros;

use App\Models\Base\BaseModel;
use Closure;

class BluePrintMacros
{
    public function userInfo(): Closure
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

    public function showStatus(): Closure
    {
        return function () {
            $this->enum('show_status', BaseModel::SHOW_STATUSES)->default(BaseModel::SHOW_STATUS_ACTIVE);
        };
    }

    public function sortOrder(): Closure
    {
        return function () {
            $this->integer('sort_order')->nullable();
        };
    }

    public function metaData(): Closure
    {
        return function () {
            $this->string('meta_title')->nullable();
            $this->text('meta_description')->nullable();
            $this->string('meta_keywords')->nullable();
        };
    }
}
