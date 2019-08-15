<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class GradeHistory extends Model {

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
    protected $table = 'employee_grade_histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'employee_id',
        'grade_id'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function employee(){
        return $this->belongsTo('App\Modules\RH\Models\Employee');
    }

    public function grade(){
        return $this->belongsTo('App\Modules\RH\Models\Grade');
    }


}
