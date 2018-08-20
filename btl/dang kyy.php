
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="lienket.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>DangKyThanhVien</title>
</head>
<body>
<div id=”wrapper”>
     <?php include('hearder.php');?>
    <div style="width:1000px; margin:50px auto" id="content">
    <center><h1> ĐĂNG KÝ </h1 ></center >
            <div style="padding:70px" class="body">
                    
                    <form method="POST">
                        <div class="form-group">
                            <label for="txtuser">Tên đăng nhập*</label>
                            <input type="text" class="form-control" id="txtuser" name="txtuser"  placeholder="Mời nhập tên đăng nhập">
                            
                        </div>
                        <div class="form-group">
                            <label for="txtpass">Mật khẩu*</label>
                            <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Mật khẩu phải từ 6-20 kí tự">
                        </div>
                        <div class="form-group">
                            <label for="txtpass1">Xác nhận mật khẩu*</label>
                            <input type="password" class="form-control" id="txtpass1" name="txtpass1" placeholder="Mời nhập lại mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="txtname">Họ tên*</label>
                            <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Mời nhập họ tên">
                        </div>
                       
                       
                        <div class="form-group">
                            <label for="txtgioitinh">Giới tính</label><br>
                            <div style="margin-left:50px" class="form-check">
                                <input type="radio" class="form-check-input"  id="txtgioitinh" name="txtgioitinh" value="nam">
                            <label class="form-check-label" for="">Nam</label>
                            </div>

                            <div style="margin-left:50px" class="form-check">
                            <input type="radio" class="form-check-input"  id="txtgioitinh" name="txtgioitinh" value="nu">
                                <label class="form-check-label" for="">Nữ</label>
                            </div>
                           
                                
                        </div>
                        <div class="form-group">
                            <label for="txtsdt">Số điện thoại*</label>
                            <input type="text" class="form-control" id="txtsdt" name="txtsdt" placeholder="Mời nhập số điện thoại">
                        </div>
                    
                        <button style="margin-left:350px" type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit">Đăng ký</button>
                        <button  class="btn btn-primary" name="btnLamlai" id="btnLamlai">Làm lại</button>
                    </form>

                    
                    </form>
                    </div>
    </div>
    <?php include('footer.php');?>
</div>
<script src="dang kyy.js"></script>
</body>  
</html>  
