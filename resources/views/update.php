<<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>修改會員資料</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <?php
         include('connmysql.php');
        $userid =$_GET['id'];
        $sql_query= "SELECT * FROM students WHERE cid = $userid ";
        $result= mysqli_query($db_link,$sql_query);
        $row_result=mysqli_fetch_assoc($result);
        $id =$row_result['cid'];
        $name =$row_result['cname'];
        $email =$row_result['cemail'];
        $birthday=$row_result['cbirthday'];
        if(isset($_POST['action']) && $_POST['action'] == 'update')
        {
            $newname =$_POST['cname'];
            $newemail =$_POST['cemail'];
            $newbirthday =$_POST['cbirthday'];
            $sqlquery="UPDATE students SET cname = '$newname' , cemail = '$newemail' ,cbirthday ='$newbirthday' WHERE cid =$userid";
            $result =mysqli_query($db_link,$sqlquery);
            $db_link ->close();
            header("Location:http://localhost/");
        die();



        }
        
            

        




        ?>
    </head>

    <body>
        <form action="" method="POST" name="formapp" id="formapp">
            <input type="text" name="c_name" id="c_name" value=" <?php echo $_GET[ 'id'] ?>"></br>
            <input type="date" name="c_birthday" id="c_birthday" value="<?php echo date('Y-m-d',strtotime($birthday)) ?>"></br>
            <input type="text" name="c_email" id="c_email" value=<?php echo $email ?>></br>
            <button type="submit" name="button" id="button1"></br>
      </form>


        
        
    </body>
</html>