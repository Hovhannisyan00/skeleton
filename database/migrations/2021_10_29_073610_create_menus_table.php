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
            $table->string('slug');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('group_name')->nullable();
            $table->string('url');
            $table->string('icon')->nullable();
            $table->boolean('show_status')->default(1);
            $table->enum('type', [Menu::MENU_TYPE_ADMIN, Menu::MENU_TYPE_PROFILE]);
            $table->integer('sort')->nullable();
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
