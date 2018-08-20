
<?php include('db-connect.php') ?>
<?php include('truy-van.php') ?>
<div  style="width:900px; margin:50px auto"  class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<h3>DANH SÁCH GIÁO VIÊN</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Mã giáo viên</th>
                <th>Tên giáo viên</th>
                <th>Hình ảnh</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <!-- <th>Số điện thoại</th> -->
				<th>Edit</th>
				<th>Xóa</th>

			</tr>
		</thead>
		<tbody>
			<?php 
				$query="SELECT * FROM giaovien order by MaGV ";
				$result= truyVanDl($link,$query);
				if( mysqli_num_rows($result)>0)
				{
					while($row= mysqli_fetch_assoc($result))
					{ ?>
						<tr>
							<td id='idsv'><?php echo $row['MaGV']; ?></td>
							<td id=''><?php echo $row['TenGV']; ?></td>
							<td id=''><img width="200px" height="200px" src="images/<?php echo $row['image']; ?>"></td>
                             <td><?php echo $row['NgaySinh']; ?></td> 
                            <td id=''><?php echo $row['DiaChi']; ?></td>
                           
							<td>
							
							<a href="qlgiaovien.php?gv=sua&&idgv=<?php echo $row['MaGV']; ?>"><img width=25 height=25 src="images/file_edit.png"  ></a>
							
							</td>
							<td>
							
							<a href="xoagv.php?gv=<?php echo $row['MaGV'] ?>" onclick="return confirm('  Bạn có thật sự muốn xóa?');" ><img width=25 height=25 src="images/file_delete.png" ></a>

							
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

