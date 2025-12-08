<?php
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [

    'auth' => Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
    'guest' => RedirectIfAuthenticated::class,
    'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
    'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

    'role' => CheckRole::class,
    ];
}
