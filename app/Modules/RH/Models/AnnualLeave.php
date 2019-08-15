<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualLeave extends Model {

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
    protected $table = 'annual_leaves';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year',
        'balance',
        'employee_id'
    ];

    public function employee(){
        return $this->belongsTo('App\Modules\RH\Models\Employee');
    }


}
