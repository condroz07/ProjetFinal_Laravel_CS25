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
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $blogId = $request->route('id');
        $blog = Blog::find($blogId);
    
    if (Auth::user()->role_id === 1) {
        // Les utilisateurs avec le rôle "admin" peuvent créer, éditer et supprimer tous les blogs
        return $next($request);
    } elseif (Auth::user()->role_id === 3) {
        if ($request->isMethod('POST')) {
            // Les utilisateurs avec le rôle "webmaster" peuvent créer des blogs, mais uniquement éditer et supprimer leurs propres blogs
            if ($blog->author_id !== Auth::user()->id) {
                return response(['error' => 'Vous n\'avez pas la permission d\'éditer ce blog'], 403);
            }
        }
        return $next($request);
    } elseif (Auth::user()->role_id === 4) {
        if ($request->isMethod('POST')) {
            // Les utilisateurs avec le rôle "redacteur" peuvent créer des blogs, mais uniquement éditer et supprimer leurs propres blogs et ceux des webmasters
            if ($blog->author_id !== Auth::user()->id && !Auth::user()->role_id === 3) {
                return response(['error' => 'Vous n\'avez pas la permission d\'éditer ce blog'], 403);
            }
        }
        return $next($request);
    }
    return response(['error' => 'Vous n\'avez pas les permissions nécessaires pour effectuer cette action'], 403);
}
}
