<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>comment</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </head>
    <body>
       
       <div id="heading">
               <h1>更新留言</h1>
           </div>
       
       <div id="content" style="text-align: center" >

       
       <textarea name="textarea" id="textarea" placeholder="請輸入留言" rows="6"></textarea>
       <button onclick="editcomment()" style="margin:3pt auto;" >更新</button> <br>
       <p id =msg></p>
    </div>
       <script>
       
        function editcomment() 

       {
          
           const data ={
              // user:window.localStorage.getItem("token"),
              
              content:$('#textarea').val(),
              token:window.localStorage.getItem("token"),
              account:window.localStorage.getItem("user"),
              comment_id :window.sessionStorage.getItem('c_id')
              
               
           }
           
          

           $.ajax({
   url: "/api/edit",                        // url位置
   type: 'POST',                   // post/get
   data: data,       // 輸入的資料
   error: function (xhr) { 
       var error= window.localStorage.getItem("userdata")
       alert(error)
   },      // 錯誤後執行的函數
   success: function (response) {


       $("#msg").html(response);
       window.location ="/show"
    }// 成功後要執行的函數
   
});

       } 

      
       
       </script>
       
   </body>
</html>