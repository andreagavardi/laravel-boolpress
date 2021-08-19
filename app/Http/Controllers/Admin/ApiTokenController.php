<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    public function update(Request $request)
    {
    $token = Str::random(80);
    //dd($token);
     $request->user()->forceFill([
            'api_token' => hash('sha256', $token)
        ])->save();
         //return ['token'=> $token];
         return back()->with('api_token', $token);
    }
}
