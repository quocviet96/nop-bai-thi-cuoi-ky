
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
                <h1 style="margin-top:30px">DANH SÁCH KHÓA HỌC</h1>  
                <a href="qlkh.php?kh=them">Thêm khóa học</a>
                <a href="qlkh.php?kh=listkh">Danh sách khóa học</a>
            </div>
                
                 <?php
                    if(isset($_GET['kh'])){
                        $id=$_GET['kh'];}else{
                            $id='listkh';
                        }

                    if(!isset($id) OR $id=='listkh'){
                        include('listkh.php');
                    } else
                    
                    if(isset($_GET['kh'])&& $id=='them' ){
                        include('themkh.php');
                    }else if(isset($_GET['kh'])&& $id=='sua' ){
                        include('suakh.php');
                    }else if(isset($_GET['kh'])&& $id=='xoa' ){
                        include('xoakh.php');
                    }

                     
                 ?>
            
            <?php include('footer.php'); ?>
        </div>
       
   
</body>
</html>