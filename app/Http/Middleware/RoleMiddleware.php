<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('/');  //login ace kina check .
        }

        $authUser = auth()->user();  //eta ekta query jetar maddhome currently logged in user er information pawa jabe.seta varriable te store kora holo.

        if (!in_array($authUser->role, $roles)) {    //role check korbe je user er role ki allowed roles er moddhe ache kina. jodi na thake tahole unauthorized error dibe.
            abort(403, 'Unauthorized');
        }

        return $next($request);

    }
}
