<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
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
    protected $table = 'destinations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'customer_id',
    ];

	public function customer()
    {
        return $this->hasOne('App\Modules\Commerce\Models\Customer', 'id', 'customer_id');
    }

    public function mission()
    {
        return $this->belongsToMany('App\Modules\Commerce\Models\Mission');
    }
	
}