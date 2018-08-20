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

				if(empty($_POST['TenGV']))
                { $error[]='TenGV'; } else{ $TenGV=$_POST['TenGV']; }
                if(empty($_POST['NgaySinh']))
				{ $error[]='NgaySinh'; } else{ $NgaySinh=$_POST['NgaySinh']; }
                
                if(empty($_POST['DiaChi']))
				{ $error[]='DiaChi'; } else{ $DiaChi=$_POST['DiaChi']; }
				if($_FILES['image']['name']==null )
				{
					$error[]='image';
				}else{ 
					 if(($_FILES['image']['error'] == 0) &&($_FILES['image']['type'] == "image/jpeg"
				        || $_FILES['image']['type'] == "image/png"
				        || $_FILES['image']['type'] == "image/jpg"))
					 {

					 	 if($_FILES['image']['size'] > 2097152){
				               $error[]= 'File vượt quá kích thước';
				            }else{
				            	$filename = "images/".$_FILES["image"]["name"];
									//$image=$_FILES['image']['name']; 
				            	$path=kiemtra_filename($filename,$num=0);
				            	 $infor = pathinfo($path);
				            	 $image=$infor['filename'].".". $infor['extension'];
									move_uploaded_file($_FILES["image"]["tmp_name"],	"images/" . $image);
								}
				            	
				           
					 }else{
					 	$error[]='file khác định dạnh';
					 }
				
				}
				
				if(empty($error))
				{

					$query="INSERT INTO giaovien(TenGV,NgaySinh,image,DiaChi) VALUES ('{$TenGV}','{$NgaySinh}','$image','{$DiaChi}')";
					
					$result=truyVanDl($link,$query);
					if($result==1){echo'Thêm mới thành công';
                        $_POST['TenGV']='';
                        // $_POST['idKH']='';
                        $_POST['NgaySinh']='';
                        $_POST['DiaChi']='';

					} else{ echo 'Thêm mới thất bại';}

				}else {
					$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
				}
				
			}
		}
	 ?>
	<form name="" method="POST" enctype="multipart/form-data">
		<?php 
			if(isset($message)){
				echo $message;
			}
		 ?>

		<h3>THÊM MỚI GIÁO VIÊN</h3>
		<div class="form-group" >
			<label>Tên giáo viên</label>
            <input type="text" value="" name="TenGV" class="form-control" placeholder="Tên giáo viên">
            <label>Ngày sinh</label>
            <input type="date" value="" name="NgaySinh" class="form-control" >
             <label>Hình Ảnh</label>
            <input type="file" value="" name="image" class="form-control" >
            
			<label>Địa chỉ</label>
            <input type="text" value="" name="DiaChi" class="form-control" placeholder="Địa chỉ">
           
			
		</div>
		
		<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
	</form>
</div>