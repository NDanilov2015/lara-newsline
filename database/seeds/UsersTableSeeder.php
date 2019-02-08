<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::truncate();
		User::insert([
		[
			'name' => 'admin',
			'email' => 'admin@email.com',
			'password' => bcrypt('admin'),
			'remember_token' => str_random(10),
			'created_at' => new DateTime,
			'updated_at' => new DateTime
		],
		]);
    }
}
