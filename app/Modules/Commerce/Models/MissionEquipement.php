<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class MissionEquipement extends Model
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
    protected $table = 'mission_equipements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mission_id',
        'equipement_id'
    ];

}