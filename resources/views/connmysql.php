<?php 
$db_host="127.0.0.1";
$db_username="root";
$db_password="";
$db_name="test";
$db_link = @mysqli_connect($db_host,$db_username,$db_password,$db_name);
if(!$db_link)
{
    die("db link failed");

} else
{
    echo "db_link success";
    

}
mysqli_query($db_link,"SET NAMES 'utf8'"); //設定資料庫編碼utf8

?>