<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

	protected $fillable =[
		'title',
		'slug',
		'body',
		'thumbnail',
		'published_at',
		'user_id'
	];

	protected $dates = ['published_at'];

	public function scopePublished($query)
	{
		$query->where('published_at','<=',Carbon::now());
	}

	public function scopeUnPublished($query)
	{
		$query->where('published_at','>',Carbon::now());
	}

    public function user()
    {
    	return $this->hasOne('\App\User');
    }

    public function comments()
    {
    	return $this->hasMany('\App\Comment');
    }

    public function setPublishedAtAttribute($date){
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

}
