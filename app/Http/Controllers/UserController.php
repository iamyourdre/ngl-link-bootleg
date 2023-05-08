<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public function register(Request $request)
    // {
    //     // $api_key = $request->input('api_key');

    //     // if ($api_key !== env('API_KEY')) {
    //     //     return response()->json([
    //     //         'status' => 'error',
    //     //         'message' => 'Invalid API key'
    //     //     ], 401);
    //     // }

    //     $validator = Validator::make($request->all(), [
    //         'nama' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6'
    //     ], [
    //         'nama.required' => 'Nama harus diisi',
    //         'email.required' => 'Email harus diisi',
    //         'email.email' => 'Format email tidak valid',
    //         'email.unique' => 'Email sudah digunakan',
    //         'password.required' => 'Password harus diisi',
    //         'password.min' => 'Password minimal 6 karakter'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'message' => 'Registrasi gagal',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     $user = User::create([
    //         'nama' => $request->nama,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'api_key' => substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 20) // menghasilkan string random 20 digit
    //     ]);

    //     return response()->json([
    //         'message' => 'Registrasi berhasil',
    //         'user' => $user
    //     ], 201);
    // }

    public function register(Request $request)
    {
        // $api_key = $request->input('api_key');

        // if ($api_key !== env('API_KEY')) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Invalid API key'
        //     ], 401);
        // }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ], [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Registrasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_key' => substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 20) // menghasilkan string random 20 digit
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'Registrasi berhasil',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Login gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user,
            'token' => $token
        ], 200);
    }
    public function submitRegister(Request $request)
    {
        $responseBody = $this->register($request);

        return view('login', [
            'response' => $responseBody
        ]);
    }
}
