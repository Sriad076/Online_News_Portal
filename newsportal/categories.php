
<!--  SE Lab Project  
 
      After Mid  -->

<?php
session_start();
if ($_SESSION['email']==true) {
  
}else
  header('location:admin_login.php');
  $page='categories';

include('include/header.php');

?>

<div style="width: 70% ; margin-left: 25%; margin-top: 10% ">
	<div class="text-right">
		<button class="btn"><a href="addsubcategory.php">Add Sub-Category</a></button>

	</div>	
	 <table class="table table-bordered">
	 	<tr>
	 		<th>Id</th>
	 		<th>Sub-Category Name</th>
	 		<th>Description</th>	
	 		<th>Edit</th> 	 		
	 		<th>Delete</th> 
	 	</tr>
	 	<?php
	 	include('database/connection.php');
	 	$query=mysqli_query($conn,"select * from subcategory");
	 	while ($row=mysqli_fetch_array($query)) {	 			 	
	 	?>
	 	<tr>
	 		<td><?php echo $row['id']; ?></td>
	 		<td><?php echo $row['subcategory_name']; ?></td>
	 		<td><?php echo $row['des']; ?></td>

	 		<td><a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">edit</a></td>

	 		<td><a href="delete.php?del=<?php echo $row['id']; ?>"class="btn btn-danger">delete</a></td>    

	 	</tr>
	 <?php } ?>
	 	
	 </table>
	
</div>

<?php
include('include/footer.php');

?>



