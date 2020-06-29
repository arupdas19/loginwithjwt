<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id'=>1,'role_name' => "ADMIN"],
            ['id'=>2,'role_name' => "USER"]
        ];
        $data = [];
        foreach ($roles as $role) {
            $role['created_at'] = Carbon::now();
            $role['updated_at'] = Carbon::now();
            $data[] = $role;
        }
        Role::insert($data);
    }
}
