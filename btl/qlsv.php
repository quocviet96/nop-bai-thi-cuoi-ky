
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
                <h1 style="margin-top:30px"> QUẢN LÝ SINH VIÊN</h1>  
                <a href="qlsv.php?sv=them">Thêm sinh viên</a>
                <a href="qlsv.php?sv=listsv">Danh sách sinh viên</a>
            </div>
            
            <?php
            if(isset($_GET['sv'])){
                $id=$_GET['sv'];}else{
                    $id='listsv';
                }
            if(!isset($id) OR $id=='listsv') {// chưa tồn tại id, hoặc id=listsv thì include file listsv.php vào
                include('listsv.php');
            } else
            
            if( $id=='them' ){
                include('themsv.php');
            }else if( $id=='sua' ){
                include('suasv.php');
            }else if($id=='xoa' ){
                include('xoasv.php');
            }

             
         ?>

         <?php include('footer.php'); ?>
        </div>
        
   
</body>
</html>