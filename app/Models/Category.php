<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'parent_id'];

    public function surveys()
    {
    	return $this->hasMany('App\Models\Survey');
    }
}
