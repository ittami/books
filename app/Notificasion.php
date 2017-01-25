<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Notificasion extends Model
{
    protected $table = "notifications" ;
    
    public function getMatchedUserIdAttribute() {
        return explode(':', explode(',', $this->data)[1])[1] ;
    }
    
    public function getMatchedUserNameAttribute() {
        return \App\User::find((explode(':', explode(',', $this->data)[1])[1]))->name ;
    }
    
    public function getMatchedBookIdAttribute() {
       return explode(':', explode(',', $this->data)[2])[1];
    }
    
    public function getMatchedBookTitleAttribute() {
        return \App\Book::find(explode(':', explode(',', $this->data)[2])[1])->title ;
    }
    
    public function getMatchedLocationAttribute() {
        
       return (explode(':', explode(',', $this->data)[0])[1] == "have_user_match")? explode(':', explode(',', $this->data)[4])[1]: explode(':', explode(',', $this->data)[3])[1] ;
    }
    
    public function getMatchedLocationNameAttribute() {
       return \App\Location::find((explode(':', explode(',', $this->data)[0])[1] == "have_user_match")? explode(':', explode(',', $this->data)[4])[1]: explode(':', explode(',', $this->data)[3])[1])->name ;
    }
}   
