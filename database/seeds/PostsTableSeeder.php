<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Category;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$now = Carbon::now()->toDateTimeString();
		$time1 = Carbon::now()->subDays(1);
		$time2 = Carbon::now()->subDays(3);
		$time3 = Carbon::now()->subDays(5);
		
		$posts_data = [
			[ 
				//Нулевой элемент нам не нужен
			],
			//Наука и техника
			[
				'name' => 'Обри Ди Грей обещает продлить жизнь человека свыше 100 лет',
				'description' => 'Английский исследователь Обри Ди Грей, основатель некоммерческого фонда "Мафусаил", обещает что к 2050 году людям будет доступно лекарство от старости, продлевающее жизнь человека свыше 100 лет. А первый человек который перешагнет рубеж в 1000 лет, родится в ближайшие годы',
				'slug' => 'obrhey-grey-prodlit-zhizn-do-1000-let',
				'created_at' => $now,
				'updated_at' => $now,
			],
			//Погода
			[
				'name' => 'В Москве прошёл ледяной дождь',
				'description' => 'Большие ледяные градины сыпались с неба на провода линий электропередач, вызывая многочисленные короткие замыкания, остановку троллейбусов и трамваем. Сильно пострадали электрички МЦК, в которых произошло короткое замыкание надвагонного оборудования. В отдельных районах города град величиной с куриное яйцо причинял сильные ушибы междуушного нервного узла зазевавшимся прохожим.',
				'slug' => 'ledyanoy-dozd',				
				'created_at' => $time1,
				'updated_at' => $time1,
			],
			//Политика
			[
				'name' => 'Макрон целовался с Трампом',
				'description' => 'Президент Франции Макрон долго целовался с президентом США Трампом взасос, оставив на его губах следы помады. Эта новость обошла все мировые СМИ. В этом плане он намного переплюнул известного советского руководителя Л.И. Брежнева',
				'slug' => 'prezidenti-tceluytsya',
				'created_at' => $time2,
				'updated_at' => $time2,
			],
			//Путешествия
			[
				'name' => 'Разорился ещё один туроператор',
				'description' => 'Произошло разорение известного оператора Натали-Турс. На островах в Южно-Китайском море остались тысячи российских граждан. МЧС организует их эвакуацию самолётами во Владивосток, откуда они смогут продолжить путешествие на поезде',
				'slug' => 'razorilsya-turoperator-natali-turs',
				'created_at' => $time3,
				'updated_at' => $time3,
			],
			
		]; //end $posts_data array
			
		Post::truncate(); //Обнуляем таблицу, id-шки тоже сбрасываются в ней
		
		//Перебираем по четырём тестовым категориям
		for ($i = 1; $i <= 4; $i++) {
			
			$post = new App\Post($posts_data[$i]);
			
			$category = App\Category::find($i);
			$category->posts()->save($post);
			
		} //end for
    }
}
