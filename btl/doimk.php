<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="lienket.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>QUẢN TRỊ</title>
</head>      
<body>
        <div id=”wrapper”>
            
            <?php include('header1.php'); ?>
            <div >
                <h1 style="margin-top:30px;text-align: center;">ĐỔI MẬT KHẨU</h1>
                <div style=" border: 1px solid#ccc; width: 600px; margin: 0 auto; padding: 30px 50px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    

                    <?php 

                        include("db-connect.php");
                        include("truy-van.php");

                        if($_SERVER['REQUEST_METHOD']=="POST")
                        {
                            $matkhaucu= $_POST['matkhaucu'];
                            $matkhaumoi=$_POST['matkhaumoi'];
                            $query="SELECT id, pass FROM admin WHERE id={$_SESSION['uid']} and pass=md5('{$matkhaucu}') ";
                            $result= truyVanDl($link,$query);

                            if(mysqli_num_rows($result)==1)
                            {
                                if(trim($_POST['matkhaumoi'])!=trim($_POST['xacnhanMKmoi']))
                                {
                                    $message="<p class='required'>Mật khẩu mới không giống nhau</p>";
                                }else{
                                    $query_change="UPDATE admin SET pass=md5(trim('{$matkhaumoi}') )WHERE id={$_SESSION['uid']}  ";
                                    $result_change=truyVanDl($link,$query_change);
                                    if($result_change==1)
                                    {
                                        $message="<p class='required'>Đổi mật khẩu thành công</p> ";
                                    }else{
                                        $message="<p class='required'>Đổi mật khẩu thất bại</p> ";
                                    }
                                }

                            }else{ 
                                $message="<p class='required'>Mật khẩu cũ không đúng</p>";
                            }
                        }
                        

                     ?>
                     <?php 
                        if(isset($message)){
                            echo $message;
                        }
                    ?>
                    <form method="POST">
                    <div class="form-group">
                         
                            <label>Tài khoản</label>
                            <input type="text" name="taikhoan" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?>" class="form-control" disabled="true">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu cũ</label>
                            <input type=password name="matkhaucu" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type=password name="matkhaumoi" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Xác nhận mật khẩu mới</label>
                            <input type=password name="xacnhanMKmoi" value="" class="form-control">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Đổi mật khẩu">
                </form>
                </div>
                
                 
                
                
            </div>
                
            
            <?php include('footer.php'); ?>
        </div>
       
   
</body>
</html>
<style type="text/css">
    .required{
        color: red;
    }
</style>


