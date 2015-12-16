<?php namespace App\Models\Product;

use App\Extended\CustomModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends CustomModel
{
    use SoftDeletes;

    protected $table = 'products_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    public function products()
    {
        return $this->hasMany('App\Models\Product\Product', 'categoryId');
    }
}