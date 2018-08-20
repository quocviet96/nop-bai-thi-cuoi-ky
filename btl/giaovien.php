
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="lienket.css">
<title>GIÁO VIÊN</title>
</head>      
<body>
        <div id=”wrapper”>
        <?php include('header.php');?>
            <h1 style="margin-top:50px; text-align:center">THẦY CÔ GIẢNG DẠY</h1>
            <?php 
            include('db-connect.php');
            include('truy-van.php');
            $query= "SELECT * FROM giaovien";
            $result=truyVanDL($link,$query);
            if($result){
                while($row=mysqli_fetch_assoc($result)){?>
                    <div style="width:700px; margin:0px auto;border-bottom:1px solid #ccc; padding:40px 0px">
                        <div  style="display:inline-block; width:50%; "><img src ="images\<?php echo $row['image'];?>" style="width: 325px;height:325px" </img> </div>
                        <div style="display:inline-block;width:40%; font-size:25px; float:right; height:325px">
                            <p><strong><?php echo $row['TenGV'];?></strong></p>
                            <p> Ngày sinh: <?php echo $row['NgaySinh'];?></p>
                            <p> Địa chỉ: <?php echo $row['DiaChi'];?></p>
                        </div>
                        <div class="cleat:both;"></div>
                
                    </div>
              <?php  }
            }
            ?>  
            
      
        <?php include('footer.php');?>
        </div>
   
    
   
</body>
</html>