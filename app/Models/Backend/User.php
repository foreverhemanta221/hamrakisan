<?php

namespace App\Models\Backend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes are mass assignable
     *
     * @var array
     */
    protected $fillables = [
        'username',
        'email',
        'password'
    ];
    public $guarded=[];
    /**
     * The attributes are hidden for arrays
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'identifier'
    ];
    
    public function isDashBoardUser()
    {

        if ($this->identifier == 1) {
            return true;
        }

        return false;
    }
    public function isGuestUser()
    {

        if ($this->identifier == 0) {
            return true;
        }

        return false;
    }

    public function getFullNameOrUsername()
    {
        if ($this->getFirstName() != '' && $this->getFirstName() != '') {
            return "{$this->getFirstName()} {$this->getLastName()}";
        }

        return $this->getUserName();
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function booking(){
        return $this->hasMany('App\Models\Backend\Package\Booklist','user_id');
    }
    public function rel_emailverification(){
        return $this->hasOne('App\Models\Backend\EmailVerification','user_id');
    }
    public function forget_password(){
        return $this->hasOne('App\Models\Backend\ForgetPassword','user_id');
    }
    public function rel_custombooking(){
        return $this->hasOne('App\Models\Backend\Package\CustomTourPackage','user_id');
    }
}
