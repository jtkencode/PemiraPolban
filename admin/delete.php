<?php
$con=mysqli_connect('localhost','root','','db_pemira');

$id_calon = $_POST['id_calon'];

mysql_query("delete from calon where id_calon=$id_calon");
if(mysql_error()){
	$result['error']=mysql_error();
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
}
echo json_encode($result);

?>
