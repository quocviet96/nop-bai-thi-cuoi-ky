
<?php include('db-connect.php') ?>
<?php include('truy-van.php') ?>
<div  style="width:900px; margin:50px auto"  class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<h3>DANH SÁCH TÀI KHOẢN</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Mã tài khoản</th>
                <th>Tên tài khoản</th>
                <th>Username</th>
                <th>Quyền</th>
				<th>Edit</th>
				<th>Xóa</th>

			</tr>
		</thead>
		<tbody>
			<?php 
				$query="SELECT * FROM admin order by id ";
				$result= truyVanDl($link,$query);
				if( mysqli_num_rows($result)>0)
				{
					while($row= mysqli_fetch_assoc($result))
					{ ?>
						<tr>
							<td id='id'><?php echo $row['id']; ?></td>
							<td id=''><?php echo $row['ten']; ?></td>
                            <td id=''><?php echo $row['username']; ?></td>
                            <td id=''><?php if( $row['quyen']==0){echo"admin";}else{echo "Giáo viên";}  ?></td>
							<td>
							
							<a href="qltk.php?tk=sua&&idtk=<?php echo $row['id']; ?>"><img width=25 height=25 src="images/file_edit.png"  ></a>
							
							</td>

							<?php if($row['quyen']!=0){
								?>
								<td>
							
							<a href="xoatk.php?tk=<?php echo $row['id'] ?>" onclick="return confirm('  Bạn có thật sự muốn xóa?');" ><img width=25 height=25 src="images/file_delete.png" ></a>

							
							</td>
							<?php } ?>
						</tr>

				<?php 
					}
				}
			?>
		</tbody>
	</table>
</div>
<?php mysqli_close($link); ?>