<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Thread extends Model {
	protected $fillable = ['title', 'body', 'user_id'];

	public function user() {
    	return $this->belongsTo('App\User');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }
    
    public function likes() {
    	return $this->belongsToMany('App\User', 'likes');
    }

    public function getIsLikedAttribute() {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }
}
