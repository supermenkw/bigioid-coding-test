<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Category extends Model
{
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cat_categories';

    protected $fillable = [
        'name', 'photo', 'slug'
    ];

    protected $hidden = [

    ];
}
