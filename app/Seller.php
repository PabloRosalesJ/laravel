<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'username', 'password', 'people_id'
    ];

    protected $hidden = [
        'password', 'token',
    ];

    public function person(){
        return $this->belongsTo('App\Person', 'people_id');
    }
}
