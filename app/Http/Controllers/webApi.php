<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Jobs\SendEmail;

class WebApi extends Controller
{
    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['access_token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json($success, $this-> successStatus); 
        } 
        else{ 
            return response()->json(['message'=>'Invalid credentials'], 401); 
        } 
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            // 'name' => 'required', 
            'email' => 'required|unique:users|email', 
            'password' => 'required', 
            // 'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
            // return response()->json(['error'=>$validator->errors()], 401);    
            return response()->json(['message'=>'Email already taken'], 400);          
        }
                $input = $request->all(); 
                $input['password'] = bcrypt($input['password']); 
                $user = User::create($input); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                // $success['name'] =  $user->name;
        // return response()->json(['success'=>$success], $this-> successStatus); 
      
        
        $details = ['email' =>$input['email']];
        $emailJob = (new      SendEmail($details))->delay(Carbon::now()->addMinutes(1));
        dispatch($emailJob);
        // SendEmail::dispatch($details);
        return response()->json(['success'=>'User successfully registered'], 201); 
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}
