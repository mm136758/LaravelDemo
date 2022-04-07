<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>scuess</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    </head>
    @include('layouts.master')
    <body>


        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        token : <p id='msg'>123</p>
        <script>
        getUserData();
        function getUserData() 

        {
            const data ={
                user: '<?php echo csrf_token() ?>'
            }
           

            $.ajax({
    url: '/api/getUserData',                        // url位置
    type: 'POST',                   // post/get
    data: data,       // 輸入的資料
    error: function (xhr) { },      // 錯誤後執行的函數
    success: function (response) {


        $("#msg").html(response.userData);
     }// 成功後要執行的函數
    
});

        }

       
        
        </script>
        登入成功
    </body>
</html>