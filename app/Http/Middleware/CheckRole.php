<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!$user->relationLoaded('role')) {
            $user->load('role');
        }

        if ($user->role && in_array($user->role->nom, $roles)) {
            return $next($request);
        }

        abort(403, 'Accès non autorisé');
    }
}
