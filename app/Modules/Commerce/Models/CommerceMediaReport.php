<?php

namespace App\Modules\Commerce\Models;

use Illuminate\Database\Eloquent\Model;

class CommerceMediaReport extends Model
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
    protected $table = 'commerce_media_reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mission_id',
        'image',
        'etat'
    ];

	public function mission()
    {
        return $this->hasOne('App\Modules\Commerce\Models\Mission', 'id', 'mission_id');
    }
	
}