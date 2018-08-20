<?php 
	include('db-connect.php');
	include('truy-van.php');
	if(isset($_GET['gv'])&& filter_var($_GET['gv'],FILTER_VALIDATE_INT, array('min_range'>=1))) //ktra xem dã dc set và có phải là kiểu số không
	{
		$id=$_GET['gv'];
		//xóa ảnh trong thư mục upload
		$sql= "SELECT * FROM giaovien WHERE MaGV=$id ";
		$result_anh= truyVanDL($link,$sql);
		$row= mysqli_fetch_assoc($result_anh);
		// echo $a='images/'.$row['image'];die;
		unlink('images/'.$row['image']);
		// unlink('../../image/'.$row['image2']);
		// unlink('../../image/'.$row['image3']);

		//xóa trong csdl
		$query="DELETE FROM giaovien WHERE MaGV= {$id}";
		$result= truyVanDl($link,$query);
		if($result==1)
		{
			echo 'Xóa thành công';
			
		}else{ echo "Xóa không thành công";}
		 header('Location:qlgiaovien.php?gv=listgv');
	}else{ 
		
		header('Location:qlgiaovien.php?gv=listgv');
	}
	 mysqli_close($link); 
 ?>