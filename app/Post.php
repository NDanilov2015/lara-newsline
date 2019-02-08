<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
	
	protected $fillable = ['category_id', 'slug', 'name', 'description'];
	
	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}
