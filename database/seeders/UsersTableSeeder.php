<?php

namespace Database\Seeders;

use App\Models\Office;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create encoding user from offices

        foreach (Office::all() as $office) {
            $suffixes = ['01','02'];
            foreach ($suffixes as $suffix) {
                $username = strtolower(str_replace(' ', '', $office->acronym . $suffix));
                $email =  $username . '@dummy.com';
                \DB::table('users')->insert([
                    'first_name' => $office->acronym,
                    'last_name' => $suffix,
                    'email' => $email,
                    'password' => Hash::make('password'),
                    'office_id' => $office->id,
                    'role_id' => Role::findByName('encoder')->id,
                    'activated_at' => now(),
                    'password_changed_at' => now(),
                    'avatar' => 'https://robohash.org/' . md5($email) . '?set=set5',
                    'username' => $username,
                ]);
            }
        }
    }
}
