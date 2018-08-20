
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
                <h1 style="margin-top:30px">DANH SÁCH TÀI KHOẢN</h1>  
                <a href="qltk.php?tk=them">Thêm tài khoản</a>
                <a href="qltk.php?tk=listtk">Danh sách tài khoản</a>
            </div>
                
                 <?php
                    if(isset($_GET['tk'])){
                        $id=$_GET['tk'];}else{
                            $id='listtk';
                        }

                    if(!isset($id) OR $id=='listtk'){
                        include('listtk.php');
                    } else
                    
                    if(isset($_GET['tk'])&& $id=='them' ){
                        include('themtk.php');
                    }else if(isset($_GET['tk'])&& $id=='sua' ){
                        include('suatk.php');
                    }else if(isset($_GET['tk'])&& $id=='xoa' ){
                        include('xoatk.php');
                    }

                     
                 ?>
            
            <?php include('footer.php'); ?>
        </div>
       
   
</body>
</html>