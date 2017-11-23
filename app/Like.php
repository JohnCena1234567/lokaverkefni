<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {
    protected $fillable = ['thread_id', 'user_id'];
}
