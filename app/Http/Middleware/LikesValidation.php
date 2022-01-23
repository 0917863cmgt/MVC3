<?php

namespace App\Http\Middleware;

use App\Models\Like;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LikesValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $id = Auth::id();
            $count = Like::whereNotNull('recipe_id')->whereNull('comment_id')->where('user_id', '=', $id)->count();
            if( $count < 5){
                return back()->with('fail', 'U moet ' . (5-$count) . ' extra recepten liken om een recept te plaatsen!');
            }
        } else {
            return back()->with('fail', 'U moet ingelogd zijn om een comment te plaatsen');
        }
        return $next($request);
    }
}
