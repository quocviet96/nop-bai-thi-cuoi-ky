<?php session_start(); ?>
        <div id="header">
        <img src ="images/it.png" style="width: 1550px;height:200px"> </img>
        
            
        </div>
        

    <div id="menu">
        <div class="flex-containner">  
        <a href="btl.php"class="lienket">Trang chủ</a> 
        <a href="qlsv.php"class="lienket"> Quản lý sinh viên </a>
        <a href="qlkh.php"class="lienket"> Quản lý khóa học </a>
        <a href="qltintuc.php"class="lienket"> Quản lý tin tức </a>
        <?php if($_SESSION['quyen']==0){
            ?>
            <a href="qlgiaovien.php"class="lienket"> Quản lý giáo viên </a>
            <a href="qltk.php"class="lienket"> Quản lý tài khoản</a>
        <?php } ?>

        <a href="doimk.php"class="lienket"> Đổi mật khẩu</a>
        
        <a href="logout.php"class="lienket">Đăng xuất</a>
        </div>   
    </div>
