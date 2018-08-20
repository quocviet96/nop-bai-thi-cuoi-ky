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

				if(empty($_POST['tenSV']))
                { $error[]='tenSV'; } else{ $tenSV=$_POST['tenSV']; }
                // if(empty($_POST['idKH']))
				// { $error[]='idKH'; } else{ $idKH=$_POST['idKH']; }
                if(empty($_POST['sdt']))
                { $error[]='sdt'; } else{ $sdt=$_POST['sdt']; }
                if(empty($_POST['diachi']))
				{ $error[]='diachi'; } else{ $diachi=$_POST['diachi']; }
				
				if(empty($error))
				{

					$query="INSERT INTO Sinhvien(tenSV,diachi,sdt) VALUES ('{$tenSV}','{$diachi}','{$sdt}')";
					
					$result=truyVanDl($link,$query);
					if($result==1){echo'Thêm mới thành công';
                        $_POST['tenSV']='';
                        // $_POST['idKH']='';
                        $_POST['sdt']='';
                        $_POST['diachi']='';

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

		<h3>THÊM MỚI SINH VIÊN</h3>
		<div class="form-group">
			<label>Tên sinh viên</label>
            <input type="text" value="" name="tenSV" class="form-control" placeholder="Tên sinh viên">
            <!-- <label>Tên khóa học</label> -->
            
			<label>Địa chỉ</label>
            <input type="text" value="" name="diachi" class="form-control" placeholder="Địa chỉ">
            <label>Số điện thoại</label>
			<input type="text" value="" name="sdt" class="form-control" placeholder="Số điện thoại">
			
		</div>
		
		<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
	</form>
</div>