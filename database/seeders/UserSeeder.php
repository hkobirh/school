<?php

namespace Database\Seeders;

use App\Models\Subject;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        $faker = Factory ::create ();
        User ::create ( [
            "name"     => "Humayun Kobir" ,
            "email"    => "admin@gmail.com" ,
            "password" => Hash ::make ( 123456 ) ,
        ] );

        foreach ( range ( 1 , 20 ) as $item ) {
            User ::create ( [
                "name"     => $faker -> name ,
                "email"    => $faker -> unique () -> email ,
                "password" => Hash ::make ( 123456 ) ,
            ] );
        }
    }
}
