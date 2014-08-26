<?php
include "connect.php";
include "need.php";

//select max labnumber of tb_04
$sql="select max(l_o_n) from tb_04";
$maxnow=mysql_query($sql);
$maxnow=mysql_fetch_row($maxnow);
if (!($maxnow[0]))
{
condb2();
 
$sql="select lab_order_number from
 lab_head where order_date between '2010-10-01' and '2010-12-31' 
 and (sub_group_list like '%88%' or sub_group_list like '%89%') ";
$res=mysql_query($sql);
if (mysql_num_rows($res) == 0)
{
echo "no data";
}else{
while($row = mysql_fetch_array($res)){
addtb($row["lab_order_number"]);
};//while
};//if
 }else{
 condb2();
//Check if have labnumber > tb_04  
$sql="select lab_order_number,vn,hn,order_date from
 lab_head where lab_order_number > ".$maxnow[0]."
 and (sub_group_list like '%88%' or sub_group_list like '%89%') ";
$res=mysql_query($sql);
mysql_close();
if (mysql_num_rows($res) == 0)
{
echo "no new data";
}else{
while($row = mysql_fetch_array($res)){
addtb($row["lab_order_number"]);
};//while
};//if
};
//ตรวจสอบลงผลในช่องที่ไม่มีผล
addmissval('afb_res','409');
addmissval('epi_res','411');
addmissval('wbc_res','410');
addmissval('col_type','429');
addmissval('sp_type','428');
?>