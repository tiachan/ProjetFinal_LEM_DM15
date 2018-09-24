<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
	protected $fillable = [
        'title', 
        'link',
    ];
    public function post() {
    	return $this->belongsTo(Post::class);
    }
}