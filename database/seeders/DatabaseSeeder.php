<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
//		 User::factory(10)->create();

		$user = User::factory()->create([
			'name' => 'Test User',
			'email' => 'test@example.com',
		]);

		Invoice::factory(100)->create([
			'user_id' => $user,
		]);
	}
}
