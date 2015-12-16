<?php namespace App\Models\Product;

use App\Extended\CustomModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends CustomModel
{
    use SoftDeletes;

    protected $table = 'products_prices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['productId', 'name', 'value'];
}