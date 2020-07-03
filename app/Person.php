<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // Relationships

    public function buyer(){
        return $this->hasOne('App\Buyer', 'people_id');
    }

    // Mutators

    /*
    *   Geters
    */
    
    public function getFullNameAttribute(){
        $fullname = "{$this->name} {$this->ap_pat} {$this->ap_mat}";        
        return ucwords($fullname);
    }

    public function getAddressAttribute($value)
    {
        return ucwords($value);
    } 

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getApPatAttribute($value)
    {
        return ucwords($value);
    }

    public function getApMatAttribute($value)
    {
        return ucwords($value);
    }

    /*
    *   Seters
    */

    public function SetNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }

    public function SetApPatAttribute($value){
        $this->attributes['ap_pat'] = strtolower($value);
    }

    public function SetApMatAttribute($value){
        $this->attributes['ap_mat'] = strtolower($value);
    }

    public function SetAddressAttribute($value){
        $this->attributes['address'] = strtolower($value);
    }

    // Properties

    protected $fillable = [
        'name', 'ap_pat', 'ap_mat','address', 'phone'
    ];
    
    protected $hidden = [
        'deleted_at', 'admin', 'email', 'token'
    ];
}
