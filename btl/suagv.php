<!-- <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script> -->

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<style type="text/css">
	.message{ color: red; margin-top: 5px; text-align: center }
	.required{ color: red;margin-left: 350px}
</style>
<?php 
// session_start();
	include('db-connect.php');
	include('truy-van.php');
	if(!isset($_SESSION['uid']))
	{
		header('Location: login.php');
	}else{
		$ID_user= $_SESSION['uid'];
	}
 ?>
<?php 
  	
	if( isset($_GET['idgv']))
		{
			$id=$_GET['idgv'];
			
			
		}else{
			header('Location: qlgiaovien.php?gv=listgv');
			exit();
		}

		$query_id="SELECT * FROM giaovien WHERE MaGV=$id";
		
					$result_id= truyVanDl($link,$query_id);
					//kiểm tra xem câu lệnh truy vấn trả về kq hay k?, có thì lấy dl bản ghi đó
						if(mysqli_num_rows($result_id)==1)
						{
							$row_bv= mysqli_fetch_assoc($result_id);
						}else{
							$message="<p class='required'>Giáo viên không tồn tại</p>";
						}

	//kiểm tra xem đã đc submit chưa
	if(isset($_POST['submit']))
	{
		if($_SERVER['REQUEST_METHOD']=="POST")
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
				$image= $row_bv['image'];
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

				 //xóa ảnh trong thư mục
				 $sql="SELECT image From giaovien where MaGV=$id";
				 $result_anh= truyVanDl($link,$sql);
				 if(mysqli_num_rows($result_anh)>0)
				 {
				 	 $row_anh= mysqli_fetch_assoc($result_anh);
				 	 if(file_exists('images/'.$row_anh['image']))
				 	 {
				 	 	// unlink('images/'.$row_anh['image']);
				 	 }
					
				 }
			
			}
			 
			
			if(empty($error))
			{
				$query= "UPDATE `giaovien` SET `TenGV`='$TenGV',  `NgaySinh`='$NgaySinh', `image`='$image', `DiaChi`='$DiaChi' WHERE `MaGV`=$id";
				$result=mysqli_query($link,$query);
				
				
				if($result)
				{
					echo '<p class="required">Sửa giáo viên thành công</p>';
					
					$query_id="SELECT * FROM giaovien WHERE MaGV=$id";
					$result_id= truyVanDl($link,$query_id);
					//kiểm tra xem câu lệnh truy vấn trả về kq hay k?, có thì lấy dl bản ghi đó
						if(mysqli_num_rows($result_id)==1)
						{
							$row_bv= mysqli_fetch_assoc($result_id);
						}else{
							$message="<p class='required'>Giáo viên không tồn tại</p>";
						}

				}else{
					echo '<p class="required">Sửa thất bại</p>';}
			}else{$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";}
		}
	}
	
 ?>
<div  style="width:900px; margin:50px auto"   class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<form name="form-baiviet" method="POST" enctype="multipart/form-data">
		<?php 
			if(isset($message)){
				echo $message;
			
			}
		 ?>
		<h3>SỬA GIÁO VIÊN</h3>
	
		<div class="form-group">
			<label>Tên giáo viên</label>
			<input type="text" name="TenGV" class="form-control" value="<?php if(isset($row_bv['TenGV'])) {echo $row_bv['TenGV'];} ?>">
			<?php 
				if(isset($error)&&in_array('TenGV', $error))
				{
					echo '<p class="message">Bạn chưa nhập tên giáo viên</p>';
				}
			 ?>
			
		</div>
		<div class="form-group">
			<label>Ngày sinh</label>
			<input type="date" name="NgaySinh" class="form-control" value="<?php if(isset($row_bv['NgaySinh'])) {echo $row_bv['NgaySinh'];} ?>">
			<?php 
				if(isset($error)&&in_array('NgaySinh', $error))
				{
					echo '<p class="message">Bạn chưa nhập ngày sinh</p>';
				}
			 ?>
			
		</div>
		<div class="form-group">
			<label>Hình ảnh</label>
			<?php
				if(isset($row_bv['image'])){ 
			 ?>
			<p><img width="300" src="images/<?php if(isset($row_bv['image'])) echo $row_bv['image']; ?>"></p>
			<?php }?>
			<input  type="file" name="image" class="form-control" ></input>
			<?php
				if(isset($error)&&in_array('image', $error))
				{
					echo '<p class="message">Bạn chưa chọn ảnh</p>';
				}
				 if(isset($error)&&in_array('File vượt quá kích thước', $error))
				 {
				 	echo '<p class="message">File không được vượt quá 2mb</p>';
				 }
				 if(isset($error)&&in_array('file khác định dạnh', $error))
				{
					echo '<p class="message">File phải có định dạng là jpeg, png hoặc jpg</p>';
				}
			  ?> 
			
		</div>
	
		
		<div class="form-group">
			<label>Địa chỉ</label>
			<input type="text" name="DiaChi" class="form-control" value="<?php if(isset($row_bv['DiaChi'])) {echo $row_bv['DiaChi'];} ?>">
			<?php 
				if(isset($error)&&in_array('DiaChi', $error))
				{
					echo '<p class="message">Bạn chưa nhập địa chỉ</p>';
				}
			 ?>
			
		</div>

		
		<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		
	</form>
</div>