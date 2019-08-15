<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model {

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
    protected $table = 'leave_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_date',
        'leave_date',
        'status',
        'reason',
        'period',
        'employee_id'
    ];

    protected $dates = [
        'request_date',
        'leave_date'
    ];

    public function employee(){
        return $this->belongsTo('App\Modules\RH\Models\Employee');
    }



}
