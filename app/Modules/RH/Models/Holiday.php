<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model {

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'holidays';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'label',
        'type',
        'recoverable'
    ];

    protected $dates = [
        'date'
    ];


}
