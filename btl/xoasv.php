<?php 
	include('db-connect.php');
	include('truy-van.php');
	if(isset($_GET['sv'])&& filter_var($_GET['sv'],FILTER_VALIDATE_INT, array('min_range'>=1))) //ktra xem dã dc set và có phải là kiểu số không
	{
		$id=$_GET['sv'];
		
		//xóa trong csdl
		$query="DELETE FROM sinhvien WHERE id= {$id}";
		$result= truyVanDl($link,$query);
		if($result==1)
		{
			echo 'Xóa thành công';
			
		}else{ echo "Xóa không thành công";}
		 header('Location:qlsv.php?sv=listsv');
	}else{ 
		
		header('Location:qlsv.php?sv=listsv');
	}
	 mysqli_close($link); 
 ?>