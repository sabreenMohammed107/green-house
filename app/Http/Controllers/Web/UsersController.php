<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
class UsersController extends Controller
{

    use AuthenticatesUsers;
    //
    public function login(){

        return view('web.login');
    }

    public function register(){
        return view('web.register');
    }


    public function saveLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

        if(auth()->user()->type == 'admin'){
            Auth::logout();
            $request->session()->invalidate();

            return $this->loggedOut($request) ?: redirect('/user-login');
        }else{
            return redirect()->intended(url('/'));
        }
    }else{
        return redirect()->route('user-login')
            ->with('error','Email-Address And Password Are Wrong.');
    }
    }




    /**
 * Get the post register / login redirect path.
 *
 * @return string
 */
public function redirectPath()
{
    // Logic that determines where to send the user
    if (\Auth::user()->type == 'user') {
        return '/';
    }

    return '/user-login';
}


public function logout(){
    Auth::logout();
    return redirect('/');
}
}
