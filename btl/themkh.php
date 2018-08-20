<div style="width:900px; margin:50px auto"  class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<!-- kiểm tra xem form đã đc submit hay k -->
	<?php 
		include('db-connect.php');
		include('truy-van.php');
		
		if(isset($_POST['submit']))
		{
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$error= array();

				// if(empty($_POST['MaKH']))
                // { $error[]='MaKH'; } else{ $maKH=$_POST['MaKH']; }
                if(empty($_POST['id_MH']))
				{ $error[]='id_MH'; } else{ $idMH=$_POST['id_MH']; }
                if(empty($_POST['NgayBD']))
                { $error[]='NgayBD'; } else{ $NgayBD=$_POST['NgayBD']; }
                if(empty($_POST['NgayKT']))
				{ $error[]='NgayKT'; } else{ $NgayKT=$_POST['NgayKT']; }
				
				if(empty($error))
				{
                    //  echo $NgayBD; echo $NgayKT;  echo $idMH;  die;
					$query="INSERT INTO `khoahoc` (`MaKH`, `NgayKT`, `idMH`, `NgayBD`) VALUES (NULL, '$NgayKT', '$idMH', '$NgayBD');";
					
					$result=truyVanDl($link,$query);
					if($result==1){echo'Thêm mới thành công';
                       
                        $_POST['idMH']='';
                        $_POST['NgayBD']='';
                        $_POST['NgayKT']='';

					} else{ echo 'Thêm mới thất bại';}

				}else {
					$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
				}
				
			}
		}
	 ?>
	<form name="" method="POST">
		<?php 
			if(isset($message)){
				echo $message;
			}
		 ?>

		<h3>THÊM MỚI KHÓA HỌC</h3>
		<div class="form-group">
			<!-- <label>Mã khóa học</label>
            <input type="text" value="" name="MaKH" class="form-control" placeholder="Mã khóa học"> -->
            <label>Tên môn học</label>
            <select class="form-control" name="id_MH">
				<option value="0">---Chọn môn học---</option>
				<?php 
					$monhoc= Monhoc();
					while ($row= mysqli_fetch_assoc($monhoc)){ ?>
						<option value="<?= $row['id']?>"> <?= $row['tenMH']?></option>
					<?php 
						}
				 	?>
			</select>
			<label>NgàyBĐ</label>
            <input type="date" value="" name="NgayBD" class="form-control" placeholder="NgàyBĐ">
            <label>NgàyKT</label>
			<input type="date" value="" name="NgayKT" class="form-control" placeholder="NgàyKT">
			
		</div>
		
		<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
	</form>
</div>