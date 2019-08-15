<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class RecoveryRequest extends Model {

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
    protected $table = 'recovery_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'holiday_id',
        'employee_id'
    ];


    public function employee(){
        return $this->belongsTo('App\Modules\RH\Models\Employee');
    }

    public function holiday(){
        return $this->belongsTo('App\Modules\RH\Models\Holiday');
    }



}
