<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'type', 'order', 'survey_id'];

    public function survey()
    {
    	return $this->belongsTo('App\Models\Survey', 'survey_id');
    }

    public function answers()
    {
    	return $this->hasMany('App\Models\Answer');
    }

    public function choices()
    {
    	return $this->hasMany('App\Models\Choice');
    }

}
