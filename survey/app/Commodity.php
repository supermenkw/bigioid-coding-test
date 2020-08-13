<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

use App\Category;

class Commodity extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'com_commodities';
    
    protected $fillable = [
        'name', 'users_id', 'categories_id', 'price', 'slug', 'status', 'units'
    ];

    protected $hidden = [

    ];

    public function surveyor()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function approvedBy()
    {
        return $this->hasOne(User::class, 'id', 'approved_by');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categories_id','id');
    }
}
