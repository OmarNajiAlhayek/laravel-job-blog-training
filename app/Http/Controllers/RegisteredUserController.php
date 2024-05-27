<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UpdateRegisteredUserRequest;


// "intelephense.diagnostics.undefinedMethods": false,

class RegisteredUserController extends Controller
{

    public function show()
    {
        return view('auth.show');
    }


    public function create()
    {
        return view('auth.register');
    }


    public function store(RegisterRequest $request)
    {
        //? 1. validate
        //? 2. create the user in the db.
        //$user = User::create($request->validated());

        //? 4. log in
        //Auth::login($user);
        Auth::login(User::create($request->validated()));
        //? 5. redirect where ever we want, somewhere



        // config(['session.lifetime' => 5]);


        $request->session()->flash('success', 'true');
        $request->session()->flash('error', 'There was a problem processing your request.');
        return to_route('home');
    }

    public function update(UpdateRegisteredUserRequest $request)
    {
        $validated = $request->validated();

        auth()->user()
        ->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'birthday' => $validated['birthday'],
        ]);
        return to_route('registers.show');
    }

    public function destroy()
    {
        auth()->user()->delete();
        return to_route('home');
    }

    public function editPassword()
    {
        return view('auth.edit-password');
    }


    public function checkOldPassword(EditPasswordRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();

        if ($this->isNotCorrectPassword($validated['old-password'], $user->password))
            $this->throwWrongPasswordException();

        $user->update([
            'password' => $validated['new-password'],
        ]);

        return to_route('registers.show');
    }


    private function isNotCorrectPassword($provided_password, $original_password): bool
    {
        return !Hash::check($provided_password, $original_password);
    }

    private function throwWrongPasswordException()
    {
        throw ValidationException::withMessages([
            'old-password' => 'The provided password does not match your current password.',
        ]);
    }

}
