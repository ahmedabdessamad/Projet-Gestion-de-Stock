<?php

namespace App\Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {

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
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'min_salary',
        'max_salary'
    ];

    public function employees(){
        return $this->hasMany('App\Modules\RH\Models\Employee');
    }


}
