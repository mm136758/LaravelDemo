<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SHOW</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
@include('layouts.master')
<body>
<div id="heading">
				<h1>SHOW</h1>
			</div>

   
  <div id = "content"> </p>  <br></div>
<button id="comment" onclick=showdata() >顯示留言</button>
<button id="comment" onclick=comment() >新增留言</button>

    
          
    </body>
    <script>
    var result = window.localStorage.getItem("token")
    var userid= window.localStorage.getItem("user")
    alert(userid)
    function comment() {
        window.location= "/comment"

        
    }
    function showdata(){
       
        const data = {
            account:userid,
            token:result

        }
        $("#c_table").remove();
       
        $.ajax({
    url: "/api/showdata",                       // url位置
    type: 'POST',                   // post/get
    data: data,       // 輸入的資料
    error: function (xhr) {
        alert("有資料")

        
     },      // 錯誤後執行的函數
    success: function (result) 
    
    {

        
       
        var text = "<table id = 'c_table'><thead><tr><th>ID</th><th>留言</th><th>NAME</th></tr>"
       
        $.each(result,function(index,e){

          text=text + "<tr> <td>" + e['comment_id'] +" </td> <td>" + e['content'] + "</td><td> "+e['account'] +"</td><td><button onclick=delete_id("  +  e['comment_id'] +  ")>刪除</button><button onclick=edit_id("  +  e['comment_id'] +  ")>修改</button></td></tr> "

        })
        $("#content").append(text)
        
                
        
         }// 成功後要執行的函數
         
        
       
     });
     
     
     }
     
     function delete_id(id)
     {
        const data = {
            account:userid,
            token:result,
            comment_id:id,


        }
        $.ajax({
    url: "/api/delete_comment",                       // url位置
    type: 'POST',                   // post/get
    data: data,       // 輸入的資料
    error: function (xhr) {
        alert("失敗")

        
     },      // 錯誤後執行的函數
    success: function (result) 
    
    {

       alert(result)              
        
         }// 成功後要執行的函數





        });

     }

     function edit_id(id)
     {
         window.sessionStorage.setItem('c_id',id)
         window.location ="/edit"
        

     }
     
     
     
       
        </script> 
        </html>