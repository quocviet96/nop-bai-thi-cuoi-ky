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
		if( isset($_GET['idsv']) )
		{
            $id=$_GET['idsv'];
           
           
		}else{
			header('Location: qlsv.php?sv=listsv');
			exit();
        }

         
       
           

		// kiểm tra xem form đã đc submit chưa 
		if(isset($_POST['submit']))
		{
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				//kiểm tra nếu trống thì đưa ra lôi, nếu không thì gán giá trị
				$error= array();
				if(empty($_POST['tenSV']))
				{
					$error[]='tenSV';

				}else{
					$tenSV= $_POST['tenSV'];
                }
                // if(empty($_POST['idKH']))
				// { $error[]='idKH'; } else{ $idKH=$_POST['idKH']; }
                if(empty($_POST['sdt']))
                { $error[]='sdt'; } else{ $sdt=$_POST['sdt']; }
                if(empty($_POST['diachi']))
				{ $error[]='diachi'; } else{ $diachi=$_POST['diachi']; }

				if(empty($error))
				{
					$query="UPDATE sinhvien SET tenSV='{$tenSV}',  sdt='{$sdt}', diachi='{$diachi}' WHERE id={$id}";
					$result= truyVanDl($link,$query);
					if($result==1){ echo 'Sửa thành công';}
					else{ echo 'Sửa thất bại';}
				}else{
					$message="<p class='required'>Bạn hãy nhập đủ thông tin </p>";
				}
				
			}
		}

		//viết lệnh truy vấn để lấy thông tin của bản ghi có id vưa truyền vào
		$query_id="SELECT * FROM Sinhvien WHERE id={$id}";
		$result_id= truyVanDl($link,$query_id);
		//kiểm tra xem câu lệnh truy vấn trả về kq hay k?, có thì lấy dl bản ghi đó
		if(mysqli_num_rows($result_id)==1)
		{
            $row= mysqli_fetch_assoc($result_id);
           
            
		}else{
			$message="<p class='required'>Sinh vien không tồn tại</p>";

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
	 	<h3>SỬA ĐỔI SINH VIÊN</h3>
	 	<div class="form-group">
	 		<label>Tên sinh viên</label>
	 		<input type="text" value="<?php if(isset($row['tenSV'])) { echo $row['tenSV'];}  ?>" name="tenSV" class="form-control" placeholder="Tên sinh viên">
           
			<label>Địa chỉ</label>
            <input type="text" value="<?php if(isset($row['diachi'])) { echo $row['diachi'];}  ?>" name="diachi" class="form-control" placeholder="Địa chỉ">
            <label>Số điện thoại</label>
			<input type="text" value="<?php if(isset($row['sdt'])) { echo $row['sdt'];}  ?>" name="sdt" class="form-control" placeholder="Số điện thoại">
	 	</div>
	 	<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
	 </form>
	
</div>


