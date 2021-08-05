<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Spatie\Permission\Traits\HasRoles;
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
>>>>>>> 2039c5a27e449ff2061d72f29a41c5ba7409146f

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //
=======
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
>>>>>>> 2039c5a27e449ff2061d72f29a41c5ba7409146f
    }
}
