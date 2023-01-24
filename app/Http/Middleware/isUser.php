<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $userId = $request->route('id');
        $userToEdit = User::find($userId);
        $userToDelete = User::find($userId);

        if (Auth::user()->role_id === 1) {
            if ($request->route()->getName() === 'users.edit' && $userToEdit->id !== Auth::user()->id) {
                return $next($request);
            } elseif ($request->route()->getName() === 'users.delete' && $userToDelete->id !== Auth::user()->id) {
                return $next($request);
            } else {
                return redirect()->back()->with('danger', "Vous n'avez pas les autorisations pour effectuer cette action");
            }
        } else {
            return redirect()->back()->with('danger', "Vous n'avez pas les autorisations pour effectuer cette action");
        }
    }
}
