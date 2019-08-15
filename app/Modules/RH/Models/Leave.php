<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model {

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
    protected $table = 'leaves';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'status',
        'reason',
        'employee_id',
        'leave_request_id'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function employee(){
        return $this->belongsTo('App\Modules\RH\Models\Employee');
    }

    public function leaveRequest(){
        return $this->hasOne('App\Modules\RH\Models\LeaveRequest');
    }


}
