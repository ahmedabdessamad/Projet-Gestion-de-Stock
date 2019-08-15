<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'reference',
        'addresse',
        'telephone',
        'mail'
    ];

    /*public function equipement()
    {
        return $this->hasMany(Equipement::class);
    }*/

    public function mission()
    {
        return $this->belongsToMany(Mission::class);
    }
}
