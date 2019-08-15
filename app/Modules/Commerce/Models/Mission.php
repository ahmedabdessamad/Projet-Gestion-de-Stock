<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
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
    protected $table = 'missions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero',
        'date',
        //'speakers',
        //'equipement',
        'customer_id'
    ];

    public function User()
    {
    return $this->hasMany(User::class)->withTimestamps();
    } 

    public function Equipement()
    {
    return $this->hasMany(Equipement::class);
    } 

    public function Customer()
    {
        return $this->hasOne('App\Modules\Commerce\Models\Customer','id','customer_id');
    }

    public function commerceMedia()
    {
        return $this->belongsTo('App\Modules\Commerce\Models\CommerceMediaReport');
    }

    public function equipementHistory()
    {
        return $this->belongsTo('App\Modules\Commerce\Models\EquipementHistory');
    }
}
