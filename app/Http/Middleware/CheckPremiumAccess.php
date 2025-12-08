<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PremiumAccess;


class CheckPremiumAccess
{
    public function handle(Request $request, Closure $next)
    {
        $contenu = $request->route('contenu');

        if ($contenu && $contenu->is_premium) {
            if (!\Illuminate\Support\Facades\Auth::check()) {
                return redirect()->route('login')->with('error', 'Connectez-vous pour accéder au contenu premium');
            }

            $hasAccess = PremiumAccess::where('user_id', \Illuminate\Support\Facades\Auth::id())
                ->where('contenu_id', $contenu->id)
                ->where('expires_at', '>', now())
                ->exists();

            if (!$hasAccess) {
                return redirect()->back()->with('warning', 'Ce contenu nécessite un achat premium');
            }
        }

        return $next($request);
    }
}
