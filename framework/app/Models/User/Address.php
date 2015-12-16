<?php namespace App\Models\User;

use App\Extended\CustomModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends CustomModel
{
    use SoftDeletes;

    protected $table = 'users_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userId', 'countyId', 'city', 'address', 'zipCode', 'company', 'fiscalCode', 'regComNr', 'bank', 'iban'];
}