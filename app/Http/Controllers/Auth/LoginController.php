<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/manager';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }
	
	/**
     * ������ ����� ������.
     *
     * @return 
     */
	public function create()
    {
        return view('auth.login');
    }
	
	public function store()
    {
        // ������� ������ ���� ������ �������
        if (!auth()->attempt(request(['name', 'password']))) {
            return back();
        }

        $user = auth()->user();
		
		return redirect('/manager');
    }
	
	public function destroy()
    {
        auth()->logout();
        return redirect('/'); //���� /auth/login
    }
}
