
<?php include('db-connect.php') ?>
<?php include('truy-van.php') ?>
<div  style="width:900px; margin:50px auto"  class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<h3>DANH SÁCH SINH VIÊN</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <!-- <th>Tên khóa học</th> -->
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
				<th>Edit</th>
				<th>Xóa</th>

			</tr>
		</thead>
		<tbody>
			<?php 
				$query="SELECT * FROM Sinhvien order by id ";
				$result= truyVanDl($link,$query);
				if( mysqli_num_rows($result)>0)
				{
					while($row= mysqli_fetch_assoc($result))
					{ ?>
						<tr>
							<td id='idsv'><?php echo $row['id']; ?></td>
							<td id=''><?php echo $row['tenSV']; ?></td>
                            <!-- <td><?php// echo $row['idKH']; ?></td> -->
                            <td id=''><?php echo $row['diachi']; ?></td>
                            <td id=''><?php echo $row['sdt']; ?></td>
							<td>
							
							<a href="qlsv.php?sv=sua&& idsv=<?php echo $row['id']; ?>"><img width=25 height=25 src="images/file_edit.png"  ></a>
							
							</td>
							<td>
							
							<a href="xoasv.php?sv=<?php echo $row['id'] ?>" onclick="return confirm('  Bạn có thật sự muốn xóa?');" ><img width=25 height=25 src="images/file_delete.png" ></a>

							
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

