<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
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
    protected $table = 'equipements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'n_serie',
        'status'
    ];



    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function Mission()
    {
    return $this->hasMany(Mission::class)->withTimestamps();
    } 

    public function equipementHistory()
    {
        return $this->belongsTo('App\Modules\Commerce\Models\EquipementHistory');
    }
}
