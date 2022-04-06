<?php
namespace App\Services;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Hash;
class CommentService
{
    public function comment($data)
    {
       // $data['cfid'] = $data['user']->comment_id;
        $newComment = Comment::create($data);
        return Comment::select('comments.*', 'name');
           // ->join('followers', 'followers.fid', 'comments.account')
            //->find($newComment->comment_id);
//        for ($i = 0; $i < 100; $i++) {
//            $data['title'] = "test title $i";
//            $data['content'] = "test content $i";
//            Comment::create($data);
//        }
    }
    public function showComment($data)
    {
        
        //array_key_exists("comment_id",$data)
        if (array_key_exists("comment_id", $data)) {
//             Comment::where('comment_id', '<', $data['comment_id'])
//                ->orderByDesc('comment_id')
//                ->take(20)
//                ->get();
            return Comment::select('comments.*')
                
                ->where('comment_id', '<', $data['comment_id'])
                ->where('account','=',$data['account'])
                ->orderByDesc('comment_id')
                ->take(20)
                ->get();
            //get(),first()都是抓資料，get()是陣列,first()只抓第一筆
        } else {
            return Comment::select('comments.*', 'account')
              //  ->join('followers', 'followers.fid', 'comments.account')
                ->orderByDesc('comment_id')
                ->take(20)
                ->get();
        }
    }
    public function inquireComment($data)
    {
        $c_id = Comment::where('account','=',$data['account'])
        ->orderByDesc('comment_id')->first();
        $data['comment_id'] =$c_id['comment_id'];
        if (array_key_exists("comment_id", $data)) {
            return Comment::where('comment_id', $data['comment_id'])
                ->orderByDesc('comment_id')
                //->take(20)
                ->first();
            //get(),first()都是抓資料，get()是陣列,first()只抓第一筆
        } else {
            return '該留言簿不存在';
        }
    }
    public function editComment($data)
    {
        $comment = Comment::find($data['comment_id']);
        if ($comment) {
            if ($comment->account == $data['account']) {
                $comment->update(['content' => $data['content']]);
                return '留言修改成功';
            } else {
                return '你不能編輯此留言';
            }
        } else
            return '無此留言';
    }
    public function deleteComment($data)
    {
        $comment = Comment::find($data['comment_id']);
        if ($comment) {
            if ($comment->account == $data['account']) {
                $comment->delete();
                return '留言刪除成功';
            } else {
                return '你不能刪除此留言';
            }
        } else
            return '無此留言';
    }
}