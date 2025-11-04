<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Premio;

class PremioApiController extends Controller
{
    public function index()
    {
        return response()->json(Premio::all());
    }
}
