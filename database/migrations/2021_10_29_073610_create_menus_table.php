<?php

use App\Models\Menu\Menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('group_name')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->enum('type', [Menu::MENU_TYPE_ADMIN, Menu::MENU_TYPE_PROFILE]);
            $table->boolean('check_permission')->default(1)->nullable();
            $table->showStatus();
            $table->sortOrder();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
