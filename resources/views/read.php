<<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>read</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <?php
        include('connmysql.php');
        $sqlquery="SELECT * FROM students ORDER BY cid ASC";
        $result =mysqli_query($db_link,$sqlquery);
        $total_records=mysqli_num_rows($result);

        
        
        ?>
    </head>

    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h1 align="center">學生總表</h1>
        <p align="center">目前資料：'<a href='/mysql/create'>新增資料</a></p>
        <table border="1" align="center">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>生日</th>
                <th>email</th>
                <th>編輯</th>

            </tr>
            <?php
            while ($row_result=mysqli_fetch_assoc($result))
            {
                echo "<tr><td>".$row_result['cid']."</td>";
                echo "<td>".$row_result['cname']."</td>";
                echo "<td>".$row_result['cbirthday']."</td>";
                echo "<td>".$row_result['cemail']."</td>";
                echo "<td><a href='/mysql/update?id=".$row_result['cid']."'".">修改</a>";
                echo "<a href='delete.php?id=".$row_result['cid']."'".">刪除</a></td>";
                echo "</tr>";
                


                

            }
            ?>
        </table>

    </body>

    </html>