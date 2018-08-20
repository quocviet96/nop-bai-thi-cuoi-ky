<?php 
session_start(); 
?>
        <div id="header">
        <img src ="images/it.png" style="width: 1550px;height:200px"> </img>
        
            
        </div>
        

    <div id="menu">
        <div class="flex-containner">  
        <a href="btl.php"class="lienket">Trang chủ</a> 
        <a href="gioithieu.php"class="lienket">Giới thiệu</a>
        <a href="tintuc.php"class="lienket">Tin tức</a>
        <a href="khoahoc.php" class="lienket">Khóa học</a> 
        <a href="giaovien.php"class="lienket">Giáo viên</a>
        <a href="lienhe.php"class="lienket">Liên hệ</a>
        <?php if(!isset($_SESSION['uid']))
        {?>
             <a href="login.php"class="lienket"> Đăng nhập </a> 
        <?php }else{?>
            <a href="quantri.php"class="lienket"> Quản trị </a>
            <a href="doimk.php"class="lienket"> Đổi mật khẩu</a>
        
            <a href="logout.php"class="lienket">Đăng xuất</a>
       <?php } ?>
       
       
        
        </div>   
    </div>
