<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;

trait HandleAuthorization
{
    protected function allow($message = null, $code = null)
    {
        return Response::allow($message, $code);
    }

    protected function deny($message = null, $code = null)
    {
        return Response::deny($message, $code);
    }
}
