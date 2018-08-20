
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="lienket.css">
<title>TIN TỨC</title>
        
</head>
<body>
        <div id=”wrapper”>
        <?php include('header.php');?>
            <h1 style="margin-top:50px; text-align:center">TIN TỨC</h1>
            <?php 
            include('db-connect.php');
            include('truy-van.php');
            $query= "SELECT * FROM tintuc where status=1";
            $result=truyVanDL($link,$query);
            if($result){
                while($row=mysqli_fetch_assoc($result)){?>
                    <div style="width:700px; margin:0px auto;border-bottom:1px solid #ccc; padding:40px ">
                    <div  ><img src ="images\<?php echo $row['image'];?>" style="width: 325px;height:325px" </img> </div>
                       
                        <div style=" font-size:25px">
                            
                            <p><strong> Tiêu đề: <?php echo $row['tieude'];?></strong></p>
                            <p> Nội dung: <?php echo $row['noidung'];?></p>
                            <p> Ngày đăng: <?php echo $row['ngaydang'];?></p>
                        </div>
                        
                
                    </div>
                    
              <?php  }
            }
            ?>  
            
      
        <?php include('footer.php');?>
        </div>
   
    
   
</body>
</html>