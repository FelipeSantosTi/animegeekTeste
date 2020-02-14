<?php

namespace ThunderByte\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ThunderByte\Http\Controllers\Controller;
use ThunderByte\Ticket;
use ThunderByte\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if(Auth::check() === true) {
            return redirect()->route('admin.home');
        }

        return view('admin.index');
    }

    public function home()
    {
        $antecipated = Ticket::where('type', 'Antecipado')->count();
        $saturday = Ticket::where('type', 'Sábado')->count();
        $sunday = Ticket::where('type', 'Domingo')->count();

        $ticketsTotal = Ticket::all()->count();

        $presentsSaturday = Ticket::where('type', 'Sábado' AND 'control', 'present')->count();
        $presentsSunday = Ticket::where('type', 'Domingo' AND 'control', 'present')->count();
        $presentsAntecipated = Ticket::where('type', 'Antecipado' AND 'control', 'present')->count();
        $presentsTotal = Ticket::where('control', 'Presente')->count();

        return view('admin.dashboard', [
            'antecipated' => $antecipated,
            'saturday' => $saturday,
            'sunday' => $sunday,
            'total' => $ticketsTotal,
            'presentsSaturday' => $presentsSaturday,
            'presentsSunday' => $presentsSunday,
            'presentsAntecipated' => $presentsAntecipated,
            'presentsTotal' => $presentsTotal
        ]);
    }

    public function login(Request $request)
    {
        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Informe todos os dados para efetuar o login')->render();
            return response()->json($json);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Informe um e-mail válido')->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Usuário e senha não conferem')->render();
            return response()->json($json);
        }

        $this->authenticated($request->getClientIp());
        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }
}
