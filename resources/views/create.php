<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>新增會員資料</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
       <form action="" method="get" name="formapp" id="formapp">
       姓名：<input type="text" name="c_name" id="c_name"><br/>
       生日：<input type="date" name="c_birthday" id="c_birthday"><br/>
       email：<input type="text" name="c_email" id="c_email"><br/>
       <input type="hidden" name="action" value="add">
       <input type="submit" name="button" value="新增資料">
       <input type="reset" name="button2" value="重新填寫">


       </form>
        
        
    </body>
    <?php
    
    
    //檢查請求是否為from所傳送的
    if(isset($_GET['action']) && $_GET['action'] =="add"){
        //include sql連接
        include("connMysql.php");
        //取得資料
        $name = $_GET["c_name"];
        $birthday=$_GET["c_birthday"];
        $email=$_GET["c_email"];
        $sqlquery = "INSERT INTO students (cname,cbirthday,cemail) VALUE('$name','$birthday','$email') ";
        //進行資料庫查詢
        $result= mysqli_query($db_link, $sqlquery);
        echo $result;
        // 回首頁
        header("Location:http://localhost/");
        die();
        
    }  
    



    


    
    
    
    
    
    
    ?>
</html>