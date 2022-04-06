<?php

namespace App\Http\Controllers;
use App\Services\UserService;
use Illuminate\Http\Request;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $postData =$request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' =>[
                    'required',
                    
                    'unique:users'
                ],
                'password' =>[
                    'required',
                    'between:6,20',
                ],
                'name' =>[
                    'required',
                    'max:20',
                ],

            ],
            [
                'account.required' => "請輸入帳號",
               
                'account.unique' => "帳號已存在",
                'password.required' => "請輸入密碼",
                'password.between' => "密碼介於6-20字",
                'name.required' => "請輸入暱稱",
                'name.max' => "暱稱不可超過20字元"
                
                
            ]
            );
            if($objValidator->fails())
            {
                return response()->json($objValidator->errors()->all(),400);
                
            }
            $userService = new UserService();
            $userService->signUp($postData);
            return response()->json("註冊成功",200);
    } 
    public function login(Request $request)
    {
        $postData = $request->all();
        session()->put('user','123');
        //session(['user' => $request['account']]);
    

        
        $objValidator = Validator::make(
            $postData,
            [
                'account' => [
                    'required',
                   
                ],
                'password' => [
                    'required',
                    //'between:6,20',
                    // 'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i'
                ],
            ],
            [
                'account.required' => '請輸入帳號',
                'password.required' => '請輸入密碼',
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
        //抓出request全部資料
        $userService = new UserService();
        $result = $userService->login($postData);
        if (!is_string($result)) {
             $token=JWTAuth::fromuser($result);
             
            //$value = $request->session()->get('key');
            return response()->json([$token], 200);
        } else
            return response()->json([$result], 400);
    }
    public function getUserData(Request $request)
    {

        
      $userdata=$request->input('user');
     return response()->json($userdata,200);
       
        
        return response()->json($userdata,200);
    }
    public function getcookie(Request $request)
    {
        $request->session()->put('key', 'value');

        return $request->session()->get('key');
        
    }
    

}
