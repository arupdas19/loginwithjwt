<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = 1;
        $user->email = "das.arup199@mail.com";
        $user->name = "Arup Das";
        $user->phone = "9563483590";
        $user->password = Hash::make('12345678');
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();
        $user->roles()->sync([1]);
    }
}
