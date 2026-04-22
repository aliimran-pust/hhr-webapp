<?php

namespace  App\Traits;

/**
 * Commonly used functions
 */
trait UtilityTrait
{
    public function messageSession($request, $message)
    {
        return $request->session()->flash('message', $message);
    }

    public function errorSession($request, $message)
    {
        return $request->session()->flash('error', $message);
    }
}
