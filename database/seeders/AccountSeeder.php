<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->male_admin(1,1);
        $this->female_admin(1,2);

        $this->male_user(2,1);
        $this->female_user(2,2);
    }

    private function male_admin ($role_id, $gender_id){
        DB::table('accounts')->insert([
            'role_id' => $role_id,
            'gender_id' => $gender_id,

            'first_name' => 'Kae',
            'middle_name' => 'Drake',
            'last_name' => 'Mortimer',
            'email' => 'kae@amazing.com',
            'password' => Hash::make('admin1234'),
            'display_picture_link' => 'public/images/steve.png',

            'delete_flag' => 0,
            'modified_at' => now(),
            'modified_by' => 'DEFAULT SEED',
        ]);
    }

    private function female_admin ($role_id, $gender_id){
        DB::table('accounts')->insert([
            'role_id' => $role_id,
            'gender_id' => $gender_id,

            'first_name' => 'Annika',
            'last_name' => 'Lucille',
            'email' => 'annika@amazing.com',
            'password' => Hash::make('admin1234'),
            'display_picture_link' => 'public/images/alex.png',

            'delete_flag' => 0,
            'modified_at' => now(),
            'modified_by' => 'DEFAULT SEED',
        ]);
    }

    private function male_user ($role_id, $gender_id){
        DB::table('accounts')->insert([
            'role_id' => $role_id,
            'gender_id' => $gender_id,

            'first_name' => 'Brandon',
            'last_name' => 'Smythe',
            'email' => 'brandon@amazing.com',
            'password' => Hash::make('user1234'),
            'display_picture_link' => 'public/images/creeper.jpg',

            'delete_flag' => 0,
            'modified_at' => now(),
            'modified_by' => 'DEFAULT SEED',
        ]);
    }

    private function female_user ($role_id, $gender_id){
        DB::table('accounts')->insert([
            'role_id' => $role_id,
            'gender_id' => $gender_id,

            'first_name' => 'Kristie',
            'middle_name' => 'Taylor',
            'last_name' => 'Botwright',
            'email' => 'kristie@amazing.com',
            'password' => Hash::make('user1234'),
            'display_picture_link' => 'public/images/enderman.png',

            'delete_flag' => 0,
            'modified_at' => now(),
            'modified_by' => 'DEFAULT SEED',
        ]);
    }
}
