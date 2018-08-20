
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
		if( isset($_GET['idtk']) )
		{
            $id=$_GET['idtk'];
           
           
		}else{
			header('Location: qltk.php?tk=listtk');
			exit();
        }

        //viết lệnh truy vấn để lấy thông tin của bản ghi có id vưa truyền vào
		$query_id="SELECT * FROM admin WHERE id={$id}";
		$result_id= truyVanDl($link,$query_id);
		//kiểm tra xem câu lệnh truy vấn trả về kq hay k?, có thì lấy dl bản ghi đó
		if(mysqli_num_rows($result_id)==1)
		{
            $row= mysqli_fetch_assoc($result_id);
           
            
		}else{
			$message="<p class='required'>Tài khoản không tồn tại</p>";

        }
        
        
    

		 

         
       
           

		// kiểm tra xem form đã đc submit chưa 
		if(isset($_POST['submit']))
		{
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				//kiểm tra nếu trống thì đưa ra lôi, nếu không thì gán giá trị
				$error= array();
				if(empty($_POST['ten']))
				{
					$error[]='ten';

				}else{
					$ten= $_POST['ten'];
                }
                
                if(empty($_POST['username']))
                { $error[]='username'; } else{ $username=$_POST['username']; }
             if(empty($_POST['pass']))
                { $pass=$row['pass']; } else{ $pass=md5($_POST['pass']); }
                

				if(empty($error))
				{
					$query="UPDATE admin SET ten='{$ten}', username='{$username}', pass='$pass' WHERE id={$id}";
					$result= truyVanDl($link,$query);
					if($result==1){ echo 'Sửa thành công';}
					else{ echo 'Sửa thất bại';}
				}else{
					$message="<p class='required'>Bạn hãy nhập đủ thông tin </p>";
				}
				
			}
		}

		//viết lệnh truy vấn để lấy thông tin của bản ghi có id vưa truyền vào
		$query_id="SELECT * FROM admin WHERE id={$id}";
		$result_id= truyVanDl($link,$query_id);
		//kiểm tra xem câu lệnh truy vấn trả về kq hay k?, có thì lấy dl bản ghi đó
		if(mysqli_num_rows($result_id)==1)
		{
            $row= mysqli_fetch_assoc($result_id);
           
            
		}else{
			$message="<p class='required'>Tài khoản không tồn tại</p>";

        }
        
        
    

		 mysqli_close($link); 

	 ?>

	 <form name="edit-sv" method="POST">
	 	<?php  
	 		if(isset($message))
	 		{
	 			echo $message;
	 		}
	 	 ?>
	 	<h3>SỬA ĐỔI TÀI KHOẢN</h3>
	 	<div class="form-group">
	 		<label>Tên tài khoản</label>
	 		<input type="text" value="<?php if(isset($row['ten'])) { echo $row['ten'];}  ?>" name="ten" class="form-control" placeholder="Tên tài khoản">
           
			<label>Username</label>
            <input type="text" value="<?php if(isset($row['username'])) { echo $row['username'];}  ?>" name="username" class="form-control" placeholder="Username">
            <label>Password</label>
			<input type="password"  name="pass" class="form-control" placeholder="******">
	 	</div>
	 	<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
	 </form>
	
</div>


