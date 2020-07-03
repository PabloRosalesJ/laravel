<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_buyer', 'no_notbook', 'no_register'
    ];

    public function person(){
        return $this->belongsTo('App\Person', 'people_id');
    }

    public function getRouteKey(){
        return $this->slug;
    }
}
