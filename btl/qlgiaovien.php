
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
            <div style="text-align: center;">
                <h1 style="margin-top:30px">QUẢN LÝ GIÁO VIÊN</h1>  
                <a href="qlgiaovien.php?gv=them">Thêm giáo viên</a>
                <a href="qlgiaovien.php?gv=listgv">Danh sách giáo viên</a>
            </div>

                
                 <?php
                    if(isset($_GET['gv'])){
                        $id=$_GET['gv'];}else{
                            $id='listgv';
                        }

                    if(!isset($id) OR $id=='listgv'){
                        include('listgv.php');
                    } else
                    
                    if(isset($_GET['gv'])&& $id=='them' ){
                        include('themgv.php');
                    }else if(isset($_GET['gv'])&& $id=='sua' ){
                        include('suagv.php');
                    }else if(isset($_GET['gv'])&& $id=='xoa' ){
                        include('xoagv.php');
                    }

                     
                 ?>
            
            <?php include('footer.php'); ?>
        </div>
       
   
</body>
</html>