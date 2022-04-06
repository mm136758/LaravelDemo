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
    <title>reg</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css">
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
</head>

<body>
    <div id = "heading">
    <h1>註冊</h1>
    </div>
    帳號: <input id="account" type="text"> <br>
    密碼: <input id="password" type="password"><br>
    name: <input id="name" type="text">

    
    <button onclick="register()">註冊</button>
    <button onclick="go_login()">返回</button>

          
    </body>
    <script>
        function go_login() {
            window.location="/"
        }
    var result ;
    function register(){
        const data = {
            account:$('#account').val(),
            password:$('#password').val(),
            name:$('#name').val()

        }
        $.ajax({
    url: "/api/register",                       // url位置
    type: 'POST',                   // post/get
    data: data,       // 輸入的資料
    error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseJSON)
        
      //  window.location.href = "/";

        
     },      // 錯誤後執行的函數
    success: function (result) 
    
    {

        
       // window.location="/home"
        alert("註冊 scuess");
        console.log(result);
       // gohome(result);
       window.location.href = "/";


        
        
         }// 成功後要執行的函數
         
        
       
     });
     
     
     }
      
        </script> 
        </html>