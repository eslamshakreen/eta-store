<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        $phone = request('phone');
        $password = request('password');

        $customer = Customer::where('phone', '=', $phone)->first();

        if (
            $customer && 
            Hash::check($password, $customer->password)
        ) { 
            $token = $customer->createToken('default');

            return ['token' => $token->plainTextToken];
        }

        return response()->json([
            'message' => 'Wrong Login Details'
        ]);
    }
}