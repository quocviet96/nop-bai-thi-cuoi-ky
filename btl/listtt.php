
<?php include('db-connect.php') ?>
<?php include('truy-van.php') ?>
<div  style="width:900px; margin:50px auto"  class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<h3>DANH SÁCH TIN TỨC</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Mã tin tức</th>
				<th>Ngày đăng</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                
                <th>Trạng thái</th>
				<th>Edit</th>
				<th>Xóa</th>

			</tr>
		</thead>
		<tbody>
			<?php 
				$query="SELECT * FROM tintuc order by id ";
				$result= truyVanDl($link,$query);
				if( mysqli_num_rows($result)>0)
				{
					while($row= mysqli_fetch_assoc($result))
					{ ?>
						<tr>
							<td id='id'><?php echo $row['id']; ?></td>
							 <td id=''><?php echo $row['ngaydang']; ?></td>
							<td id=''><div><?php echo $row['tieude']; ?></div><img width="200px" src="images/<?php echo $row['image']; ?>"></td>
                            <td id=''><?php echo $row['noidung']; ?></td>
                            <td><?php if( $row['status']==0) {echo "Chưa hiển thị";}else{echo"Hiển thị";}  ?></td>
                           
							<td>
							
							<a href="qltintuc.php?tt=sua&&idtt=<?php echo $row['id']?>"><img width=25 height=25 src="images/file_edit.png"  ></a>
							
							</td>
							<td>
							
							<a href="xoatt.php?tt=<?php echo $row['id'] ?>" onclick="return confirm('  Bạn có thật sự muốn xóa?');" ><img width=25 height=25 src="images/file_delete.png" ></a>

							
							</td>
						</tr>

				<?php 
					}
				}
			?>
		</tbody>
	</table>
</div>
<?php mysqli_close($link); ?>

