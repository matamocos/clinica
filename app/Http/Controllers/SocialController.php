<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class SocialController extends Controller
{
    
    public function redireccion($provider){

     	return Socialite::driver($provider)->redirect();
		
    }//fin redireccion
	
	public function Callback($provider){
    	$userSocial =   Socialite::driver($provider)->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();if($users){
            Auth::login($users);
            return redirect('/');
        }else{$user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);         
			  
			 //return redirect('http://clinica-plyrm.run.goorm.io/');
			  return redirect('welcome');
        }
	}//fin callback

}