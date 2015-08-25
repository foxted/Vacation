<?php

use Illuminate\Database\Seeder;
use WiderFunnel\Role;

class RolesTableSeeder extends Seeder
{

    protected $roles = ['Admin', 'Manager', 'Employee'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->roles as $role) {

            Role::create([
                'name' => $role
            ]);

        }
    }
}
