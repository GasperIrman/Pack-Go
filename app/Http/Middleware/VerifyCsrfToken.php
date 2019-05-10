<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'https://grudnik-projekti.eu/api/login*',
        'https://grudnik-projekti.eu/api/users*',
        'https://grudnik-projekti.eu/api/login*',
        'https://grudnik-projekti.eu/api/register*',
        'https://grudnik-projekti.eu/api/rent*',
        'https://grudnik-projekti.eu/api/models*',
        'https://grudnik-projekti.eu/api/motorhome*',
    ];
}
