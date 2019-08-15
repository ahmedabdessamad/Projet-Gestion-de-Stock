<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class MissionSpeakers extends Model
{
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
    protected $table = 'mission_speakers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mission_id',
        'employee_id'
    ];

}