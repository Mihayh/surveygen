<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'user_id'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function questions()
    {
    	return $this->hasMany('App\Models\Question');
    }
}
