<?php
session_start();
if ($_SESSION['email']==true) {
  
}else
  header('location:admin_login.php');
  $page='news';

include('include/header.php');

?>

<div style="margin-left:17%; width: 80%;">
   <ul class ="breadcrumb">
       <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      
      <li class="breadcrumb-item active">News</li>
    </ul>
  </div>

<div style="width: 70% ; margin-left: 25%; margin-top: 10% ">
	<div class="text-right">
		<button class="btn"><a href="AddNews.php">Add News</a></button>

	</div>	
	 <table class="table table-bordered">
	 	<tr>
	 		<th>Id</th>
	 		<th>Title</th>
	 		<th>Description</th>
	 		<th>Date</th>
	 		<th>Category</th>
	 		<th>Sub-Category</th>
	 		<th>Thumbnail</th>	 		
	 		<!--<th>Edit</th> 	 		
	 	    <th>Delete</th>  -->
	 	</tr>
	 	<?php
	 	include('database/connection.php');
	 	$query=mysqli_query($conn,"select * from news");
	 	while ($row=mysqli_fetch_array($query)) {			 	
	 	?>
	 	<tr>
	 		<td><?php echo $row['id']; ?></td>
	 			<td><?php echo $row['title']; ?></td>
	 				<td><?php echo $row['description']; ?></td>
	 					<td><?php echo $row['date']; ?></td>
	 						<td><?php echo $row['category']; ?></td>
	 						<td><?php echo $row['subcategory']; ?></td>
	 						<td><img class="img img-thumbnail" src="images/<?php echo $row['thumbnail'];?>" alt="" width="100" height="100"></td>
				<td><a class="btn btn-info" href="news_edit.php?edit=<?php echo $row['id']; ?>">edit</a></td>
				
				<td><a class="btn btn-danger" href="news_delete.php?del=<?php echo $row['id']; ?>">delete</a></td>

	 	  </tr>	 	
	 	<?php } ?> 
	 </table>
	 
	
</div>

<?php
include('include/footer.php');

?>