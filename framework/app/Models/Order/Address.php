<?php namespace App\Models\Order;

use App\Extended\CustomModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends CustomModel
{
    use SoftDeletes;

    protected $table = 'orders_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['orderId', 'countyId', 'city', 'address', 'zipCode', 'company', 'fiscalCode', 'regComNr', 'bank', 'iban'];
}