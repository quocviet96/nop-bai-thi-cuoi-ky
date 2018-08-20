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
  	
	if( isset($_GET['idtt']) && FILTER_VAR($_GET['idtt'],FILTER_VALIDATE_INT,array('min_range'>=1)) )
		{
			$id=$_GET['idtt'];
			
		}else{
			header('Location: qltintuc.php?tt=listtt');
			exit();
		}

		$query_id="SELECT * FROM tintuc WHERE id=$id";
					$result_id= truyVanDl($link,$query_id);
					//kiểm tra xem câu lệnh truy vấn trả về kq hay k?, có thì lấy dl bản ghi đó
						if(mysqli_num_rows($result_id)==1)
						{
							$row_bv= mysqli_fetch_assoc($result_id);
						}else{
							$message="<p class='required'>Tin tức không tồn tại</p>";
						}

	//kiểm tra xem đã đc submit chưa
	if(isset($_POST['submit']))
	{
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$error= array();
			$date= date('Y/m/d');
			

			if(empty($_POST['tieude']))
			{
				$error[]='tieude';
			}else{ $tieude=$_POST['tieude'];}

			$status= $_POST['status'];

			




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
				 $sql="SELECT image From tintuc where id=$id";
				 $result_anh= truyVanDl($link,$sql);
				 if(mysqli_num_rows($result_anh)>0)
				 {
				 	 $row_anh= mysqli_fetch_assoc($result_anh);
				 	 if(file_exists('images/'.$row_anh['image']))
				 	 {
				 	 	unlink('images/'.$row_anh['image']);
				 	 }
					
				 }
			
			}
			 // $status='0';
			if(empty($_POST['noidung']))
			{
				$error[]='noidung';
			}else{ $noidung=$_POST['noidung'];}
			
			if(empty($error))
			{
				$query= "UPDATE `tintuc` SET `tieude`='$tieude',  `noidung`='$noidung', `image`='$image', `status`='$status' WHERE `id`=$id";
				$result=mysqli_query($link,$query);
				
				
				if($result)
				{
					echo '<p class="required">Sửa tin tức thành công</p>';
					
					$query_id="SELECT * FROM tintuc WHERE id=$id";
					$result_id= truyVanDl($link,$query_id);
					//kiểm tra xem câu lệnh truy vấn trả về kq hay k?, có thì lấy dl bản ghi đó
						if(mysqli_num_rows($result_id)==1)
						{
							$row_bv= mysqli_fetch_assoc($result_id);
						}else{
							$message="<p class='required'>Tin tức không tồn tại</p>";
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
		<h3>SỬA TIN TỨC</h3>
	
		
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="tieude" class="form-control" value="<?php if(isset($row_bv['tieude'])) {echo $row_bv['tieude'];} ?>">
			<?php 
				if(isset($error)&&in_array('tieude', $error))
				{
					echo '<p class="message">Bạn chưa nhập tiêu đề</p>';
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
			<label style="display:block">Trạng thái</label>
			<?php 
			 if(isset($row_bv['status'])&&(($row_bv['status'])==0))
			{
			 ?>
			
			<label class="radio-inline"><input type="radio" name="status" checked="checked" value="0">Không hiển thị   </label>
			<label class="radio-inline"><input type="radio" name="status"  value="1">Hiển thị   </label>
			

			<?php 
			}else if(isset($row_bv['status'])&&(($row_bv['status'])==1)){
			?>

			<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị   </label>
			<label class="radio-inline"><input type="radio" name="status" checked="checked"  value="1">Hiển thị   </label>
			

			<?php 
			}
			?>
			
		</div>

		
		
		<div class="form-group">
			<label>Nội dung</label>
			<textarea type="text" name="noidung" class="form-control" id="noidung" ><?php if(isset($row_bv['noidung'])) echo $row_bv['noidung']; ?></textarea> 
			<script type="text/javascript">
				config={};
				config.entities_latin=false;
				CKEDITOR.replace('noidung',config);
			</script>
			<?php 
				if(isset($error)&&in_array('noidung', $error))
				{
					echo '<p class="message">Bạn chưa nhập nội dung tin tức</p>';
				}
			 ?>
			
		</div>

		
		<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		
	</form>
</div>