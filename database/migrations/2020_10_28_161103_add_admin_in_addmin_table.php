<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Admin;
class AddAdminInAddminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = [
            'name' => 'Jone Done',
            'email' => 'ars@ex.com',
            'password' => bcrypt(123),
            'phone' => 23423459,
            'address' => 'Nikunju-2',
            'image' => 'user.jpg',
            'email_verified_at' => now()
        ];
        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addmin', function (Blueprint $table) {
            //
        });
    }
}
