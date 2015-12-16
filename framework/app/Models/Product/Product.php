<?php namespace App\Models\Product;

use App\Extended\CustomModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends CustomModel
{
    use SoftDeletes;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'providerId',
        'categoryId',
        'name',
        'description',
        'image',
        'position',
        'active',
        'slug',
    ];

    public function provider()
    {
        return $this->belongsTo('App\Models\Product\Provider', 'providerId', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Product\Category', 'categoryId', 'id');
    }

    public function prices()
    {
        return $this->hasMany('App\Models\Product\Price', 'productId');
    }
}