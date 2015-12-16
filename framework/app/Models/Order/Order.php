<?php namespace App\Models\Order;

use App\Extended\CustomModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends CustomModel
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'refNo',
        'firstName',
        'lastName',
        'email',
        'phone',
        'total'
    ];

    protected $dates = ['processedDate', 'cancellationDate'];

    public function addresses() {
        return $this->hasMany('App\Models\Order\Address', 'orderId');
    }
}