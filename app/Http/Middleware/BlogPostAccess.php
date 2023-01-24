<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class BlogPostAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $blogId = $request->route('id');
        $blog = Blog::find($blogId);

        if (Auth::user()->role_id === 1) {

            return $next($request);
        } elseif (Auth::user()->role_id === 2) {
            if (Auth::user()->role_id === 2 && $request->route()->getName() == 'blog.create') {
                return $next($request);
                
            } elseif ($request->route()->getName() === 'blog.edit' && $blog->user_id === Auth::user()->id) {
                return $next($request);
            } elseif ($request->route()->getName() === 'blog.delete' && ($blog->user_id == Auth::user()->id && Auth::user()->role_id === 2)) {
                return $next($request);
            } else {
                return redirect()->back()->with('danger', "Vous n'avez pas les autorisations pour effectuer cette action");
            }
        } elseif (Auth::user()->role_id === 3) {
            if ( $request->route()->getName() === 'blog.create') {
                return $next($request);
            } elseif (Auth::user()->role_id === 3 && $request->route()->getName() === 'blog.edit' && ($blog->user_id === Auth::user()->id || $blog->user->role_id === 2)) {
                return $next($request);
            } elseif (Auth::user()->role_id === 3 && $request->route()->getName() === 'blog.delete' && ($blog->user_id === Auth::user()->id || $blog->user->role_id === 2)) {
                return $next($request);
            } else {
                return redirect()->back()->with('danger', "Vous n'avez pas les autorisations pour effectuer cette action");
            }
        } else {
            return redirect()->back()->with('danger', "Vous n'avez pas les autorisations pour effectuer cette action");
        }
    }
}
