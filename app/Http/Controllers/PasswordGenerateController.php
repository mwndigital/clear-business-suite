<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordGenerateController extends Controller
{
    public function generatePassword() {
        $length = 16; // desired password length
        $password = bin2hex(random_bytes($length));
        return response()->json(['password' => $password]);
    }
}
