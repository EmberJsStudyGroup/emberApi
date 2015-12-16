<?php namespace App\Models\Order;

use App\Extended\CustomModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Details extends CustomModel
{
    use SoftDeletes;

    protected $table = 'orders_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['orderId', 'productId', 'name', 'unitPrice', 'quantity'];
}