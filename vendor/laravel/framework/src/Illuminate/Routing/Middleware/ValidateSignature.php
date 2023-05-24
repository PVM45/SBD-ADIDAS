<?php

namespace Illuminate\Routing\Middleware;

use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Support\Arr;

class ValidateSignature
{
    /**
     * The names of the parameters that should be ignored.
     *
     * @var array<int, string>
     */
    protected $ignore = [
        //
    ];

    /**
>>>>>>> b789f4fb6c8db3a2d4b649c90ffc4e1626f270d0
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array|null  $args
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Routing\Exceptions\InvalidSignatureException
     */
    public function handle($request, Closure $next, ...$args)
    {
        [$relative, $ignore] = $this->parseArguments($args);

        if ($request->hasValidSignatureWhileIgnoring($ignore, ! $relative)) {
            return $next($request);
        }

        throw new InvalidSignatureException;
    }

    /**
     * Parse the additional arguments given to the middleware.
     *
     * @param  array  $args
     * @return array
     */
    protected function parseArguments(array $args)
    {
        $relative = ! empty($args) && $args[0] === 'relative';

        if ($relative) {
            array_shift($args);
        }

        $ignore = array_merge(
            property_exists($this, 'except') ? $this->except : $this->ignore,
            $args
        );

        return [$relative, $ignore];
    }
}
