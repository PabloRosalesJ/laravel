<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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

    protected $fillable = [
        'name', 'description', 'slug','p_compra', 'p_menudeo', 'p_mayoreo', 
        'stock', 'stock_min', 'photo', 'slug', 'category_id'
    ];
    
    protected $hidden = [
        'deleted_at',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
