<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();

        $json = File::get(base_path(). '/database/seeds/json/users.json');
        $users = json_decode($json);

        foreach ($users as $user) {
          User::create([
            'name' => $user->name,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'role_id' => $user->role_id,
            'password' => Hash::make($user->password),
            'active' => $user->active,
            'operating_unit_id' => $user->operating_unit_id,
            'unit' => $user->unit,
            'position' => $user->position,
            'avatar' => $user->avatar,
            'contact_number' => $user->contact_number,
          ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
