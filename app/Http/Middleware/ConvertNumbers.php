<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConvertNumbers
{
    protected array $persianToEnglish = [
        '۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4',
        '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->merge($this->convertRequestNumbers($request->all()));

        return $next($request);
    }

    /**
     * @param array $input
     *
     * @return array
     */
    protected function convertRequestNumbers(array $input): array
    {
        array_walk_recursive($input, function (&$value) {
            $value = strtr($value, $this->persianToEnglish);
        });

        return $input;
    }
}
