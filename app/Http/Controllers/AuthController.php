<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($request->user)],
            'password' => ['required', 'string', 'min:8']
        ], [
            'nama.required' => 'Kolom Nama harus diisi.',
            'nama.string' => 'Kolom Nama harus berupa string.',
            'nama.max' => 'Kolom Nama maksimal terdiri dari :max karakter.',
            'email.required' => 'Kolom Email harus diisi.',
            'email.email' => 'Kolom Email harus berupa alamat email yang valid.',
            'email.unique' => 'Alamat email telah terdaftar. Silakan gunakan alamat email yang lain.',
            'password.required' => 'Kolom Password harus diisi.',
            'password.string' => 'Kolom Password harus berupa string.',
            'password.min' => 'Kolom Password minimal terdiri dari :min karakter.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $user = User::createWithRandomApiKey($data);

        if ($user) {
            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return redirect()->back()->withInput()->withErrors(['Terjadi kesalahan. Silakan coba lagi.']);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->level == 'admin') {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->level == 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Email atau password salah',
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout!');
    }
}
