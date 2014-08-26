<?php
//function to add new tb_04_id
function addtb($lon)
{
condb2();  
$sql="select lab_order_number,vn,p.hn as hn,order_date, concat(pname,fname,' ',lname) as name,sex 
        from lab_head lh,patient p 
        where
         p.hn=lh.hn and
         lab_order_number = ".$lon;
$res=mysql_query($sql);
while($row = mysql_fetch_array($res)){
//add labnum name hn orderdatte sex
condb();
$sql="INSERT INTO tb_04(id,l_o_n,hn,name,o_date,sex)
 VALUES ('','".$row['lab_order_number']."','".$row['hn']."','".$row['name']."','".$row['order_date']."','".$row['sex']."')";
$res1=mysql_query($sql);
mysql_close();

//find new old
condb2();
$sql="select  lab_items_sub_group_code as labsub
        from lab_head lh,lab_order lo 
        where
         lh.lab_order_number=lo.lab_order_number
         and lab_items_code = '409'
         and lh.lab_order_number = ".$row['lab_order_number'];
$res1=mysql_query($sql);
$row1 = mysql_fetch_array($res1);
mysql_close();

condb();
if($row1["labsub"]==88)
{
$sql="UPDATE tb_04 SET n_o='N' WHERE (l_o_n=".$row['lab_order_number'].")";
mysql_query($sql);
}else
{
$sql="UPDATE tb_04 SET n_o='O' WHERE (l_o_n=".$row['lab_order_number'].")";
mysql_query($sql);
};//if
mysql_close();

//find afb res
AddValue($row['lab_order_number'],'409','afb_res');

//find and add epi res
AddValue($row['lab_order_number'],'411','epi_res');

//find and add wbc res
AddValue($row['lab_order_number'],'410','wbc_res');

//find and add Collection type
AddValue($row['lab_order_number'],'429','col_type');

//find and add Sputum type
AddValue($row['lab_order_number'],'428','sp_type');

//find and add age
condb2();  
$sql="SELECT age_y as age
          FROM lab_head , an_stat
          WHERE
          an_stat.an =  lab_head.vn AND
          lab_head.lab_order_number =".$row['lab_order_number']."
          union
          SELECT age_y as age
          FROM lab_head , vn_stat
          WHERE
          vn_stat.vn =  lab_head.vn AND
          lab_head.lab_order_number =".$row['lab_order_number'] ;
$res1=mysql_query($sql);
$row1 = mysql_fetch_array($res1);
mysql_close();
condb(); 
$sql="UPDATE tb_04 SET age='".$row1["age"]."' WHERE (l_o_n=".$row['lab_order_number'].")";
mysql_query($sql);
mysql_close();

//find and add tb04 id
condb();

$sql="select max(o_date) as ldate,max(tb_04_id) as otbid
         from tb_04
         WHERE hn='".$row['hn']."'
         and l_o_n <>'".$row['lab_order_number']."'";
$res1=mysql_query($sql);
$row1 = mysql_fetch_array($res1);

$sql="select max(round) as r from tb_04 WHERE tb_04_id = '".$row1["otbid"]."'";
$res2=mysql_query($sql);
$row2 = mysql_fetch_array($res2);

$sql = "SELECT datediff('".$row['order_date']."','".$row1["ldate"]."') as ddif";
$datediff = mysql_query($sql);
$datediff = mysql_fetch_array($datediff);
$datediff = $datediff["ddif"];
echo $datediff."<br>";

if($datediff > 3 or $row1["ldate"] == "" )
{
	newTBno($row['lab_order_number']);
}
else 
{
switch ($row2["r"])
{
  	case "1" :
  		$sql="UPDATE tb_04 SET tb_04_id='".$row1["otbid"]."' ,round='2' WHERE (l_o_n=".$row['lab_order_number'].")";
  		mysql_query($sql);
  	break;
    case "2" :
  		$sql="UPDATE tb_04 SET tb_04_id='".$row1["otbid"]."' ,round='3' WHERE (l_o_n=".$row['lab_order_number'].")";
  		mysql_query($sql);
  	break;
	case "3":
		newTBno($row['lab_order_number']);
	break;
};//end switch
};//end if
mysql_close();
};
};//end fn

function newTBno($lon)
{
condb(); 

$sql = "select o_date from tb_04 where l_o_n = ".$lon;
$test = mysql_query($sql);
$test = mysql_fetch_array($test);
$date1 = explode("-", $test["o_date"]);

echo $date[1]."<br>";

$nowtest = (($date1[0]+543)*1000000)+1;

if($date1[1] >= 10){//ถ้าเป็นเดือนตุลาคม ขึ้นไป
		$nowtest = (($test[0]+543+1)*1000000)+1;
	};

$sql = "select max(tb_04_id) as mtbid
         from tb_04";
$res2 = mysql_query($sql);
$row2 = mysql_fetch_array($res2);
$maxTBno = $row2["mtbid"];
	
if($maxTBno < $nowtest)//ถ้ายังไม่มีเลขแรก
	{
		$nowno = $nowtest;
	}else//มีเลขแรกแล้ว
		{
			$nowno = $maxTBno + 1;
		}
  $sql="UPDATE tb_04 SET tb_04_id='".$nowno."' ,round='1' WHERE (l_o_n=".$lon.")";
  mysql_query($sql);
}

//function เพิ่มค่าลงในDB
function AddValue($lon,$li,$ldb)
{
condb2();  
$sql="select  lab_order_result as labres
        from lab_order
        where
         lab_items_code = ".$li."
         and lab_order_number = ".$lon;
$res1=mysql_query($sql);
$row1 = mysql_fetch_array($res1);
mysql_close();

condb(); 
$sql="UPDATE tb_04 SET ".$ldb."='".$row1["labres"]."' WHERE (l_o_n=".$lon.")";
mysql_query($sql);
mysql_close();	
};

function addmissval($type,$lab)
{
condb();
$sql="select l_o_n from tb_04 where ".$type." = '' and l_o_n > '52619'";
$res=mysql_query($sql);
while($row = mysql_fetch_array($res)){
AddValue($row['l_o_n'],$lab,$type);
};//while
}

//function connect db1 tb_04
function condb()
{
mysql_connect ("localhost", "carddb", "1111")
    or die("Could not connect localhost");
mysql_select_db("tb_04")
    or die("could not select database TB 04</h3>\n");
    mysql_query("SET NAMES utf8");
};

//function connect db2  hosxp
function condb2()
{
mysql_connect ("192.168.1.6", "tea","1111")
    or die("Could not connect Hosxp");
mysql_select_db("hos")
    or die("could not select database hos</h3>\n");
    mysql_query("SET NAMES utf8");
};
?>