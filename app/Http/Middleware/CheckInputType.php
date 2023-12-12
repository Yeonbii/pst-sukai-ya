<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInputType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $question = $request->route('question');

        if ($question && ($question->input_type == '5' || $question->input_type == '6')) {
            return $next($request);
        }

        return redirect('/some-error-page');
    }
}
