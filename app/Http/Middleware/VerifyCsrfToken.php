<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
	
	
	protected function tokensMatch($request)
	{
   // Don't validate CSRF when testing.
	   if(env('APP_ENV') === 'laraveltesting') {
		   return true;
	   }
		
	   return parent::tokensMatch($request);
	}
	
	
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
