
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="lienket.css">
<title>KHÓA HỌC</title>
        
</head>
<body>
        <div id=”wrapper”>
        <?php include('header.php');?>
            <h1 style="margin-top:50px; text-align:center">KHÓA HỌC</h1>
            <?php 
            include('db-connect.php');
            include('truy-van.php');
            $query= "SELECT * FROM monhoc inner join khoahoc on monhoc.id=khoahoc.idMH";
            $result=truyVanDL($link,$query);
            if($result){
                while($row=mysqli_fetch_assoc($result)){?>
                    <div style="width:700px; margin:0px auto; padding:40px ">
                       
                        <div style=" font-size:25px">
                            
                            <p><strong> Môn học: <?php echo $row['tenMH'];?></strong></p>
                            <p> Ngày BD: <?php echo $row['NgayBD'];?></p>
                            <p> Ngày KT: <?php echo $row['NgayKT'];?></p>
                        </div>
                        
                
                    </div>
              <?php  }
            }
            ?>  
            
      
        <?php include('footer.php');?>
        </div>
   
    
   
</body>
</html>