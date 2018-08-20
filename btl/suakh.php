<!-- khởi tạo bộ đêmh để ng dùng nhập sai link thì trở về trang cũ -->
<style type="text/css">
	.message{
		color: red;margin-top: 5px;
	}
	.required{color: red;}
</style>




<div style="width:900px; margin:50px auto" class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	
	<?php 

		include_once ('db-connect.php');
        include_once ('truy-van.php');
        
		//kiểm tra id có phải kiểu số và tồn tại hay không, nếu tồn tại thì gán giá trị cho biết $id. ngc lại thì quay lại trang trc
		if( isset($_GET['MaKH']) )
		{
            $id=$_GET['MaKH'];
           	 //viết lệnh truy vấn để lấy thông tin của bản ghi có id vưa truyền vào
			 $query_id="SELECT * FROM khoahoc WHERE MaKH={$id}";
			 $result_id= truyVanDl($link,$query_id);
			 //kiểm tra xem câu lệnh truy vấn trả về kq hay k?, có thì lấy dl bản ghi đó
			 if(mysqli_num_rows($result_id)==1)
			 {
				 $row= mysqli_fetch_assoc($result_id);
				 $idmh=$row['idMH'];
				
				 
			 }else{
				 $message="<p class='required'>Khóa học không tồn tại</p>";
	 
			 }
           
		
		}else{
			header('Location: qlkh.php?kh=listkh');
			exit();
        }

         
       
           

		// kiểm tra xem form đã đc submit chưa 
		if(isset($_POST['submit']))
		{
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				//kiểm tra nếu trống thì đưa ra lôi, nếu không thì gán giá trị
				$error= array();
				if(empty($_POST['tenMH']))
				{
					$error[]='tenMH';

				}else{
					$tenMH= $_POST['tenMH'];
                }
                if(empty($_POST['NgayBD']))
				{  $NgayBD=$row['NgayBD']; } else{ $NgayBD=$_POST['NgayBD']; }
                if(empty($_POST['NgayKT']))
                {  $NgayKT=$row['NgayKT'];} else{ $NgayKT=$_POST['NgayKT']; }
                

				if(empty($error))
				{
					$query="UPDATE khoahoc SET  idMH={$tenMH}, NgayBD='{$NgayBD}', NgayKT='{$NgayKT}' WHERE MaKH=$id";
					$result= truyVanDl($link,$query);
					if($result==1){ echo 'Sửa thành công';}
					else{ echo 'Sửa thất bại';}
				}else{
					$message="<p class='required'>Bạn hãy nhập đủ thông tin </p>";
				}
				
			}
		}

	
		 

		


			 $query1= "SELECT tenMH FROM monhoc WHERE id=$idmh";
			 $result1=  mysqli_query($link,$query1);
			// print_r(mysqli_num_rows($result1));die;
			  if(mysqli_num_rows($result1)==1)
			  {
				  $row2= mysqli_fetch_assoc($result1);
			   
			  }
        
			 $query5= "SELECT * FROM monhoc ";
				
			  $monhoc= mysqli_query($link,$query5);
			 

	 ?>

	 <form name="edit-kh" method="POST">
	 	<?php  
	 		if(isset($message))
	 		{
	 			echo $message;
	 		}
	 	 ?>
	 	<h3>SỬA ĐỔI KHÓA HỌC</h3>
	 	<div class="form-group">
	 		
            <label>Tên môn học</label>
			
            <select class="form-control" name="tenMH">
				<option value="<?php if(isset($row['idMH']))  echo $row['idMH']; ?>"><?= $row2['tenMH'];?></option>
				<?php 
				
					while ($row1= mysqli_fetch_assoc($monhoc)){ ?>
						<option value="<?= $row1['id']?>"> <?= $row1['tenMH']?></option>
					<?php 
						 }
				 	?>
			</select>
			<label>NgàyBĐ</label>
            <input type="date" value="<?php if(isset($row['NgayBD'])) { echo $row['NgayBD'];}  ?>" name="NgayBD" class="form-control" placeholder="NgàyBD">
            <label>NgàyKT</label>
			<input type="date" value="<?php if(isset($row['NgayKT'])) { echo $row['NgayKT'];}  ?>" name="NgayKT" class="form-control" placeholder="NgayKT">
	 	</div>
	 	<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
	 </form>
	
</div>


