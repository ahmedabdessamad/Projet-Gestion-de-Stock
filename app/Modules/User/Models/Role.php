<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    public function users()
    {
        return $this->belongsToMany(
            'App\Modules\User\Models\User',
            'user_roles',
            'role_id',
            'user_id'
        )->withTimestamps();
    }
}
