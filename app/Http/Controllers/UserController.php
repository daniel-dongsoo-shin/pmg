<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use RegistersUsers;

    public function login(Request $request){

        $email = $request->json("email");
        $password = $request->json("password");
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(
                ['status'=>422, 'message'=>'Wrong email or password!']);
        }

        if (Auth::attempt(['email'=>$email, 'password'=>$password])) {
            return response()->json(['status'=>200, 'user'=> Auth::user()]);
        } else {
            return response()->json(
                ['status'=>422, 'message'=>'Wrong email or password!']); //422 Unprocessable Entity
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'title'=> 'string',
            'mobile'=> 'numeric',
            'post_code'=> 'numeric',
            'birth_date' => 'required|date',
            'term_of_use'=> 'boolean'
            //'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(
                ['status' => 422, 'message' => $validator->getMessageBag()->getMessages()]);
        }

        try {
            $validatedData = $validator->validated();
            $validatedData['password'] = Hash::make($request->password);
            $user = User::create($validatedData);
            return response()->json(['status' => 200, 'user' => $user]);
        } catch (\Exception $exception) {
            return response()->json(
                ['status' => 500, 'message' => $exception->getMessage()]);
        }
    }


    public function logout()
    {
        auth()->logout();
        return response()->json(['message'=>'Successfully logged out ']);
    }
}
