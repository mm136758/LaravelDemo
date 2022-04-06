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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
</head>
@include('layouts.master')
<body>
    	
<div id="heading">
                <h1>登入</h1></div>
                <div name="test" style="text-align: center"> 
                    帳號: <input id="account" type="text" style="margin:3pt auto;width:auto"/>
                    密碼: <input id="password" type="password" style="margin:3pt auto;width:auto">

                    
                
               
    
    <button id="login" onclick="login()">登入</button>
    <button onclick="reg()">註冊</button>
   <!-- <button onclick="getuserdata()">get</button> -->
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