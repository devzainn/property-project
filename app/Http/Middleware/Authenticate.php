<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not Authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectation() ? null : route('login');
    }

}