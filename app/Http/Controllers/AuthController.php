<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends MyController
{
    public function index()
    {
        return view('pages.main.login', $this->data);
    }

    public function indexRegister()
    {
        return view('pages.main.register', $this->data);
    }

    public function login(LoginRequest $request){
        $user = User::where([
            ["email", $request->email],
            ["password", md5($request->password)]
        ])->first();

        if ($user) {
            $request->session()->put("user", $user);

            $email = $request->session()->get("user")->email;
            $content = $request->ip()."\t".$request->url()."\t".$request->method()."\t".$email."\t"."Logged in"."\t".date("Y-m-d H:i:s");
            $write = new User();
            $write->log($content);

            return redirect()->route("home")->with("message", "You have successfully logged in!");
        } else {
            return redirect()->route("login")->with("errMessage", "Wrong combination, please try again");
        }
    }

    public function logout(Request $request){

        $email = $request->session()->get("user")->email;
        $content = $request->ip()."\t".$request->url()."\t".$request->method()."\t".$email."\t"."Logged out"."\t".date("Y-m-d H:i:s");
        $write = new User();
        $write->log($content);

        $request->session()->forget("user");
        return redirect()->back();

    }

    public function register(RegisterRequest $request)
    {
        try{
            $user = User::create($request->except(['passwordRe', 'password', '_token']) + ['password' => md5($request->password), 'role_id' => 2]);
            return redirect()->route("login")->with("regMessage", "You have successfully registered, please log in");
        } catch (\Exception $e){
            Log::error("Registration error: " . $e->getMessage());
            return redirect()->route("register")->with("errMessage", "Email you have entered is already in use, please submit another one");
        }
    }
}
