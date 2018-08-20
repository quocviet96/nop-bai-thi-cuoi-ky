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
                if(empty($_POST['ten']))
				{ $error[]='ten'; } else{ $ten=$_POST['ten']; }
                if(empty($_POST['username']))
                { $error[]='username'; } else{ $username=$_POST['username']; }
                if(empty($_POST['pass']))
				{ $error[]='pass'; } else{ $pass=md5($_POST['pass']); }
				$quyen = 1;
				if(empty($error))
				{
                    //  echo $NgayBD; echo $NgayKT;  echo $idMH;  die;
					$query="INSERT INTO `admin` (`id`, `username`, `pass`, `quyen`, `ten`) VALUES (NULL, '$username', '$pass', '$quyen', '$ten');";
					
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

		<h3>THÊM MỚI TÀI KHOẢN</h3>
		<div class="form-group">
			
            <label>Tên tài khoản</label>
            <input type="text" value="" name="ten" class="form-control" placeholder="Tên tài khoản">

			
		</div>
		 <div class="form-group">
		 	<label>Username</label>
            <input type="text" value="" name="username" class="form-control" placeholder="Username">
		 </div>
		 <div class="form-group">
		 	<label>Password</label>
			<input type="password" value="" name="pass" class="form-control" placeholder="Password">
		 </div>
		 <div class="form-group" >
		 	<label style="display: block;">Quyền</label>
		 	<label class="radio-inline"><input style="width: 15px" type="radio" value="1" name="quyen"  checked="checked" placeholder="Password"> Giáo viên </label>
			
		 </div>
		 
		
		<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
	</form>
</div>