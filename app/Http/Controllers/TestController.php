<?php

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function returnJson(Request $request) {
        
    }


    public function test() {
        return response()->json([
            'status' => 'success',
        ], 200, [], JSON_PRETTY_PRINT);
    }
    
}
