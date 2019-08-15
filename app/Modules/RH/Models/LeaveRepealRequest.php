<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRepealRequest extends Model {

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
    protected $table = 'leave_repeal_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'reason',
        'leave_request_id'
    ];

    public function leaveRequest(){
        return $this->belongsTo('App\Modules\RH\Models\LeaveRequest');
    }

}
