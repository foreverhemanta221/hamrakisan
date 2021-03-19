<?php

namespace App;

use App\Models\Images;
use App\Models\Listing;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','province','district','city','specific_address','image_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $appends=[
        'user_image'
    ];
//    private $email;
    public function rel_listing()
    {
        return $this->hasMany(Listing::class);
    }
    public function listed_farm(){
        return $this->hasOne(Listing::class);
    }
    public function checkSuperAdmin(){
        if(Auth::check()==true){
            if(Auth::user()->role == 1){
                return true;
            }
        }
    }

    public function rel_image_id(){
        return $this->belongsTo('App\Models\Images','image_id','id');
    }

    public function getUserImageAttribute(){
      if($this->image_id !=null){
          if($this->rel_image_id !=null){
              if($this->rel_image_id->image !=null){
                  return  URL::asset($this->rel_image_id->image) ;
              }
              return $this->getDefaultImageByRole();
          }else{
              return $this->getDefaultImageByRole();
          }
      }
        return $this->getDefaultImageByRole();
    }
    public function getDefaultImageByRole(){
        if($this->role=="farmer"){
            return URL::asset('frontend/img/farmer.png');
        }else{
            return URL::asset('frontend/img/user-db.png');
        }
    }

    public function rel_token(){
        return $this->hasMany(UserToken::class);
    }

    public function getUserId($token){
        $user_token = UserToken::where('api_token',$token)->first();
        if($user_token!=null){
            $user_id = $user_token->user_id;
            return $user_id;
        }
    }
}
