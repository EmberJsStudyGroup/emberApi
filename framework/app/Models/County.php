<?php namespace App\Models;

use App\Extended\CustomModel;

class County extends CustomModel
{
    protected $table = 'counties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}