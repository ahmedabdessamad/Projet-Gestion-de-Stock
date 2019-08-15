<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

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
    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eng_date',
        'salary',
        'function',
        'contract_type',
        'grade_id',
        'department_id',
        'user_id'
    ];



    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function grade(){
        return $this->hasOne('App\Modules\RH\Models\Grade');
    }

    public function user(){
        return $this->hasOne('App\Modules\User\Models\User','id','user_id');
    }
    public function department(){
        return $this->belongsTo('App\Modules\RH\Models\Department');
    }

    public function gradeHistories(){
        return $this->hasMany('App\Modules\RH\Models\GradeHistory');
    }

    public function Mission()
    {
        return $this->belongsToMany(Mission::class, 'mission_speakers');
    }
}
