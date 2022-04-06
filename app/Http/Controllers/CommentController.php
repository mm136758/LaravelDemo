<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;

use Validator;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' => [
                    'required',
                    
                    
                ],
                               
                'content' => [
                    'required',
                    'between:5,60',
                    
                ],
            ],
            [
               
                
                'content.required' => '請輸入留言內容',
                'content.between' => '留言內容需介於 5-60 字元',
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
//        return response()->json($postData, 400);
        //抓出request全部資料
        $commentService = new CommentService();
        $newComment = $commentService->comment($postData);
        return response()->json('留言成功', 200);
    }
    public function show_comment(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' => [
                    'required',
                    
                    
                ],
                'token' => [

                ]
                               
                
            ],
            [
               
                
                'account.required' => '帳號錯誤',
                
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
//        return response()->json($postData, 400);
        //抓出request全部資料
        $commentService = new CommentService();
        $least_c_id = $commentService->inquireComment($postData);
       // echo "least_c_id=" . $least_c_id;
        $all_c_data = $commentService->showComment($least_c_id);
        return response()->json($all_c_data, 200);
    }
    public function delete_comment(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' => [
                    'required',
                    
                    
                ],
                'token' => [
                    

                ] ,
                'comment_id' =>
                [
                    'integer'

                ]
                               
                
            ],
            [
               
                
                'account.required' => '帳號錯誤',
                
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
//        return response()->json($postData, 400);
        //抓出request全部資料
        $commentService = new CommentService();
        $del = $commentService->deleteComment($postData);
        return response()->json($del, 200);



    }

    public function edit_comment(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' => [
                    'required',
                    
                    
                ],
                'token' => [
                    

                ] ,
                'comment_id' =>
                [
                    'integer'

                ]
                               
                
            ],
            [
               
                
                'account.required' => '帳號錯誤',
                
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
//        return response()->json($postData, 400);
        //抓出request全部資料
        $commentService = new CommentService();
        $edit = $commentService->editComment($postData);
        return response()->json($edit, 200);



    }


}
