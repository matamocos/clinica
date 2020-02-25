<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuariosPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	public function administradores($user){
		if ($user->rol == 'admin'){
			return true;
		}else{
			return false;
		}//fin else
		
	}//fin administradores
	
	public function medicos($user){
		if ($user->rol == 'medico'){
			return true;
		}else{
			return false;
		}//fin else
		
	}//fin medicos
}
