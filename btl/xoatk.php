<?php 
	include('db-connect.php');
	include('truy-van.php');
	if(isset($_GET['tk'])&& filter_var($_GET['tk'],FILTER_VALIDATE_INT, array('min_range'>=1))) //ktra xem dã dc set và có phải là kiểu số không
	{
		$id=$_GET['tk'];
		
		//xóa trong csdl
		$query="DELETE FROM admin WHERE id= {$id}";
		$result= truyVanDl($link,$query);
		if($result==1)
		{
			echo 'Xóa thành công';
			
		}else{ echo "Xóa không thành công";}
		 header('Location:qltk.php?tk=listtk');
	}else{ 
		
		header('Location:qltk.php?tk=listtk');
	}
	 mysqli_close($link); 
 ?>