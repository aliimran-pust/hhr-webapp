<?php

namespace AI\Auth\Http\Controllers;

use App\Traits\UtilityTrait;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as AppController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class BaseController extends AppController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, UtilityTrait;
}
