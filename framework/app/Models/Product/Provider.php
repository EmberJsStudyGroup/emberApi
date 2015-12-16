<?php namespace App\Models\Product;

use App\Extended\CustomModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends CustomModel
{
    use SoftDeletes;

    protected $table = 'products_providers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'website', 'logo', 'slug'];

    public function products()
    {
        return $this->hasMany('App\Models\Product\Product', 'providerId');
    }
}