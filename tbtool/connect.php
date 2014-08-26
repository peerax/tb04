<?
$db="tb_04";
$host="localhost";
$user="carddb";
$pw="1111";

$db2="hos";
$host2="192.168.1.6";
$user2="tea";

mysql_connect ($host, $user, $pw)
    or die("Could not connect");
mysql_select_db($db)
    or die("could not select database ".$db."</h3>\n");
mysql_query("SET NAMES utf8");
?>