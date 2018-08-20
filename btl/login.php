
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="lienket.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>ĐĂNG NHẬP</title>
</head>
<body>
<div id=”wrapper”>
      <?php include('header.php');?>
    
  
    <div style="width:500px; margin:40px auto;border:1px solid #ccc; border-radius:5px; padding-top:30px" id="content">
        <center><h1> ĐĂNG NHẬP </h1 ></center >
            <div style="padding:50px" class="body">
                    
            <form method="POST">
                <div class="form-group">
                    <label for="txtuser">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="txtuser" name="txtuser"  placeholder="Mời nhập tên đăng nhập">
                    
                </div>
                <div class="form-group">
                    <label for="txtpass">Mật khẩu</label>
                    <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Mật khẩu phải từ 6-20 kí tự">
                </div>
            
                <button style="margin-left:130px" type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit">Đăng nhập</button><br>
                <!-- <a style="text-align:center; display:block" href="dang kyy.php">Bạn chưa có tài khoản?</a> -->
             </form>
                    </div>
    </div>
    
    <?php include('footer.php');?>
</div>

</body>  
</html>  
<?php 
    //  session_start() ; 
	include("db-connect.php");
	include("truy-van.php");
	include("check.php");
	//kiểm tra xem nút đăng nhập đã đc ấn chưa?
	if(isset($_POST['btnSubmit']))
	{
       
		$error= array();
		if( empty($_POST['txtuser']))
			{ $error[]= 'txtuser';}
		else {
				$kq=checkInputUser($_POST['txtuser']);
				if($kq==1)
				{
					$taikhoan=$_POST['txtuser'];
				}else {$error[]='id sai dinh dang';}
			}
				
		if( empty($_POST['txtpass']))
			{ $error[]= 'txtpass';}
		else {
				$kq_pass=checkInputPass($_POST['txtpass']);
				if($kq_pass==1)
				{
					$matkhau=md5($_POST['txtpass']);
				}else {$error[]='pass sai dinh dang';}
			}
				
		if(empty($error))
		{   
			$query= "SELECT id, username, pass,quyen FROM `admin` WHERE username='{$taikhoan}' AND pass='{$matkhau}' ";
			$result= truyVanDl($link,$query);
			if(mysqli_num_rows($result)==1){
				$row= mysqli_fetch_assoc($result);
				$_SESSION['uid']=$row['id'];
				$_SESSION['username']=$taikhoan;
		 	 $_SESSION['quyen']= $row['quyen']; 
				// $_SESSION['loggedin_time']=time();

				if($_SESSION['quyen']==0||$_SESSION['quyen']==1)
				{
					header('Location: quantri.php');
				}
				
			}else{
				$message='<p class="required">Username hoặc password không đúng<p>';
			}
		}else{
				$message='<p class="required">Username hoặc password không đúng<p>';
			}

		mysqli_close($link);
	}
 ?>
