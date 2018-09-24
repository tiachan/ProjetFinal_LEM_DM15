<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{



	protected $fillable = [
        'title', 
        'description', 
        'category_id',
        'post_type',
        'start_date',
        'end_date',
        'price',
        'nb_max',
        'status'
    ];

    public function getStartDate($value){

        return Carbon::parse($value)->format('d/m/Y');
    }

    public function scopeOrderByDate($query){
        $dateActuelle = Carbon::now();

        return $query->where('start_date', '>', $dateActuelle)->orderBy('start_date', 'ASC');
    }

    public function setCategoryIdAttribute($value){
       
        if($value == 0){
            $this->attributes['category_id'] = null;
        }else{

            $this->attributes['category_id'] = $value;
        }

    }
     public function categories() {
    	return $this->belongsToMany(Category::class);
    }
    public function picture() {
    	return $this->hasOne(Picture::class);
    }
}
