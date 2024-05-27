<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view("form");
    }

    public function submitForm(Request $request)
    {
        $validatedInput = $request->validate([
            "name" => "required",
            "password" => "required|min:8",
        ]);

        $validatedInput["password"] = bcrypt($validatedInput["password"]);

        return response()->json([
            "success" => true,
            "name" => $validatedInput["name"],
            "password" => $validatedInput["password"],
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
