<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
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
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'reference',
        'quantite',
        'quantite_min',
    ];


    public function equipement()
    {
        return $this->hasMany('App\Modules\Commerce\Models\Equipement');
    }
}
