<?php


use Illuminate\Database\Seeder;
use App\User;
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

        $bas = array('bas@world.com','123456');
        $jasper = array('jasper@world.com','123456');

        User::create([
            'email' => $bas[0],
            'password' => Hash::make($bas[1]),
            'confirmation_token' => str_limit(md5($bas[0]).str_random(),39),
        ]);

        User::create([
            'email' => $jasper[0],
            'password' => Hash::make($jasper[1]),
            'confirmation_token' => str_limit(md5($jasper[0]).str_random(),39),
        ]);

        echo "2 users zijn aangemaakt";


    }


}