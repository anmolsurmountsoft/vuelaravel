<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\User::create([
          'name'      => 'admin',
          'email'     => 'admin@example.org',
          'password'  => bcrypt('Admin@1234'),
      ]);
    }
}
