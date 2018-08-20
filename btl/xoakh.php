<?php 
	include('db-connect.php');
	include('truy-van.php');
	if(isset($_GET['kh'])&& filter_var($_GET['kh'],FILTER_VALIDATE_INT, array('min_range'>=1))) //ktra xem dã dc set và có phải là kiểu số không
	{
		$id=$_GET['kh'];
		
		//xóa trong csdl
		$query="DELETE FROM khoahoc WHERE MaKH= {$id}";
		$result= truyVanDl($link,$query);
		if($result==1)
		{
			echo 'Xóa thành công';
			
		}else{ echo "Xóa không thành công";}
		 header('Location:qlkh.php?kh=listkh');
	}else{ 
		
		header('Location:qlkh.php?kh=listkh');
	}
	 mysqli_close($link); 
 ?>