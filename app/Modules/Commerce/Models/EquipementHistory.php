<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class EquipementHistory extends Model
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
    protected $table = 'equipement_historys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mission_id',
        'equipement_id',
        'etat'
    ];

    public function mission()
    {
        return $this->hasOne('App\Modules\Commerce\Models\Mission', 'id', 'mission_id');
    }

    public function Equipement()
    {
        return $this->hasOne('App\Modules\Commerce\Models\Equipement', 'id', 'equipement_id');
    }
}
