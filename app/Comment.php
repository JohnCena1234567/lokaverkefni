<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'user_id', 'thread_id', 'parent_id'];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function parent() {
    	return $this->belongsTo('App\Comment', 'parent_id');
    }

    public function children() {
    	return $this->hasMany('App\Comment', 'parent_id');
    }
}
