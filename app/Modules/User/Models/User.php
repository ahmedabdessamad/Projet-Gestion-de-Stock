<?php

namespace App\Modules\User\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'birthday',
        'password',
        'phone',
        'status',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $dates = [
        'birthday'
    ];

    public function roles(){
        return $this->belongsToMany(
            'App\Modules\User\Models\Role',
            'user_roles',
            'user_id',
            'role_id'
        )->withTimestamps();
    }

    public function assignRole($role){
        if(is_string($role)){
            $role = Role::where('title',$role)->get();
        }
        if(!$role) return false;
        $this->roles()->attach($role);
    }

    public function retractRole($role){
        $this->roles()->detach($role);
    }

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

        public function employee(){
        return $this->hasOne('App\Modules\RH\Models\Employee','user_id','id');
    }

    public function Mission()
    {
    return $this->hasMany(Mission::class)
      ->withTimestamps();
    } 
}
