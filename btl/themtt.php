<!-- <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script> -->

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<style type="text/css">
	.message{ color: red; margin-top: 5px; }
	.required{ color: red; }
</style>
<?php 
//session_start();
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
			 $status='0';
			if(empty($_POST['noidung']))
			{
				$error[]='noidung';
			}else{ $noidung=$_POST['noidung'];}
			
			if(empty($error))
			{
				$query= "INSERT INTO `tintuc` (`id`, `iduser`,  `tieude`,  `noidung`, `image`, `ngaydang`, `status`) VALUES (NULL, '$ID_user',  '$tieude','$noidung', '$image', '$date', '$status')";
				$result=mysqli_query($link,$query);
				// $result=Insert_BV($dmbv, $ID_user,$tieude,$tomtat,$noidung, $image,$date,$status);
				
				if($result)
				{
					echo '<p class="required">Thêm mới tin tức thành công</p>';
					
					$_POST['tieude']='';
					$_POST['image']='';
					$_POST['noidung']='';
					//$_POST['danhmuc-bv']="0";

				}else{
					echo '<p class="required">Thêm mới thất bại</p>';}
			}else{$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";}
		}
	}
	
 ?>
<div  style="width:900px; margin:50px auto"   class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<form name="form-baiviet" method="POST" enctype="multipart/form-data">
		<?php 
			if(isset($message)){
				echo $message;
				//echo $result;
				//echo $tag;
				// echo $image;
				// echo $date;
				// echo "danh mục".$dmbv;
				// echo "kq".$result;

			}
		 ?>
		<h3>THÊM MỚI TIN TỨC</h3>
	
		
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="tieude" class="form-control" value="<?php if(isset($_POST['tieude'])) {echo $_POST['tieude'];} ?>">
			<?php 
				if(isset($error)&&in_array('tieude', $error))
				{
					echo '<p class="message">Bạn chưa nhập tiêu đề</p>';
				}
			 ?>
			
		</div>
	
		<div class="form-group">
			<label>Hình ảnh</label>
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
			<label>Trạng thái</label>
			<label class="radio-inline">
			<input type="radio" name="status" checked="checked" value="0">Không hiển thị</label>
		</div>

		<div class="form-group">
			<label>Người đăng</label>
			<input  type="text" name="nguoidang" value="<?php echo $_SESSION['username'] ?>" class="form-control" disabled="true"></input> 
		</div>
		
		<div class="form-group">
			<label>Nội dung</label>
			<textarea type="text" name="noidung" class="form-control" id="noidung" value="<?php if(isset($_POST['noidung'])) {echo $_POST['noidung'];} ?>"></textarea> 
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

		
		<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		
	</form>
</div>