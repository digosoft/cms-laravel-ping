<?php

namespace App\Http\Middleware;
use App\Catagory;

use Closure;

class VeryfiCatagoryCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 

        if(Catagory::all()->count() == 0) {
          Session()->flash('message', 'Not allow to create post without Catagory');
          return  redirect()->back();
        }
        return $next($request);
    }
}
