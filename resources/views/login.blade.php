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
    <title>登入</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
@include('layouts.master')
<body>

<div id="heading">

                <h1>登入</h1></div>
                <div name="test" style="text-align: center"> 
                    帳號: <input id="account" type="text" style="margin:3pt auto;width:auto"/>
                    密碼: <input id="password" type="password" style="margin:3pt auto;width:auto">

                    
                
               
    
    <button id="login" class="btn btn-primary text-light" onclick="login()">登入</button>
    <button  class="btn btn-secondary text-light" onclick="reg()">註冊</button>
</div>

                
    
    


          
    </body>
    <script>
        
        // Get the input field
var input = document.getElementById("password");
var input2 = document.getElementById("account");
function user_input(user_enter) {
    user_enter.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("login").click();

  }
});
}
user_input(input);
user_input(input2);


    
        function reg() {
            window.location="/reg"
        }
    var result ;
    function login(){
        const data = {
            account:$('#account').val(),
            password:$('#password').val()

        }
        
        var user_id= $('#account').val()
        
        window.localStorage.setItem("user",user_id)
        $.ajax({
    url: "/api/login",                       // url位置
    type: 'POST',                   // post/get
    data: data,       // 輸入的資料
    error: function (xhr) {
        alert(xhr.responseJSON)

        
     },      // 錯誤後執行的函數
    success: function (result) 
    
    {

        
       // window.location="/home"
        alert("scuess");
        console.log(result);
        window.localStorage.setItem("token",result)
        window.location="/show"

        
        
         }// 成功後要執行的函數
         
        
       
     });
     
     
     }
      function gohome(token){
          
       /*  const data= {
            
            user:$('#account').val(),
            
            token:token
        }
        var test = typeof(token);
        alert(test)
         $.ajax({
    url: "/show",                       // url位置
    type: 'get',                   // post/get
    data: data,       // 輸入的資料
    error: function (xhr) {
        //alert("home失敗")
        window.location.herf="/show"

        
     },      // 錯誤後執行的函數
    success: function (result) 
    
    {

        
        
        
        console.log(result);
        
        window.location.href = "/comment";

        
        
         }// 成功後要執行的函數
         
        
       
     });  */
     }  
        </script> 
        </html>