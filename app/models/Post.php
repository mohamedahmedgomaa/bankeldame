<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $table = 'posts';
	public $timestamps = true;
	protected $fillable = array('title', 'content', 'image', 'category_id');
    protected $appends = ['is_favourite'];

    public function getIsFavouriteAttribute()
    {
        $favourite = $this->whereHas('clients',function ($query){
            $query->where('client_post.client_id',request()->user()->id);
            $query->where('client_post.post_id',$this->id);
        })->first();
        if ($favourite)
        {
            return true;
        }
        return false;
    }

	public function clients()
	{
		return $this->belongsToMany('App\Models\Client');
	}

	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

}