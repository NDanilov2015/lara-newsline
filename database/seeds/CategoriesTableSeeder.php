<?php

use Illuminate\Database\Seeder;

use App\Category;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$now = Carbon::now()->toDateTimeString();
		$time1 = Carbon::now()->subDays(2);
		$time2 = Carbon::now()->subDays(4);
		$time3 = Carbon::now()->subDays(6);

		Category::truncate();
		
		Category::insert([
			['catname' => 'Наука и техника', 'slug' => 'science', 'created_at' => $now, 'updated_at' => $now],
			['catname' => 'Погода', 'slug' => 'weather', 'created_at' => $time1, 'updated_at' => $time1],
			['catname' => 'Политика', 'slug' => 'politics', 'created_at' => $time2, 'updated_at' => $time2],
			['catname' => 'Путешествия', 'slug' => 'travels', 'created_at' => $time3, 'updated_at' => $time3],
		]);
    }
}
