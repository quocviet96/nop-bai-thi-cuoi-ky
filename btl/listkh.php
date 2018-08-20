
<?php include('db-connect.php') ?>
<?php include('truy-van.php') ?>
<div  style="width:900px; margin:50px auto"  class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<h3>DANH SÁCH KHÓA HỌC</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Mã khóa học</th>
                <th>Tên môn học</th>
                <th>Ngày BĐ</th>
                <th>Ngày KT</th>
				<th>Edit</th>
				<th>Xóa</th>

			</tr>
		</thead>
		<tbody>
			<?php 
				$query="SELECT * FROM khoahoc order by MaKH ";
				$result= truyVanDl($link,$query);
				if( mysqli_num_rows($result)>0)
				{
					while($row= mysqli_fetch_assoc($result))
					{ ?>
						<tr>
							<td id='id'><?php echo $row['MaKH']; ?></td>
							<td id=''><?php echo $kq=selectTenMH($row['idMH']); ?></td>
                            <td id=''><?php echo $row['NgayBD']; ?></td>
                            <td id=''><?php echo $row['NgayKT']; ?></td>
							<td>
							
							<a href="qlkh.php?kh=sua&&MaKH=<?php echo $row['MaKH']; ?>"><img width=25 height=25 src="images/file_edit.png"  ></a>
							
							</td>
							<td>
							
							<a href="xoakh.php?kh=<?php echo $row['MaKH'] ?>" onclick="return confirm('  Bạn có thật sự muốn xóa?');" ><img width=25 height=25 src="images/file_delete.png" ></a>

							
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

