<?php
session_start();
if ($_SESSION['email']==true) {
  
}else
  header('location:admin_login.php');
  $page='category';

include('include/header.php');

?>

<div style="width: 70% ; margin-left: 25%; margin-top: 10% ">
	

	<form action="addcategory.php" method="post" name="categoryform"onsubmit="return validateform() ">
		<h1>Add Categories</h1>
		<hr>
  <div class="form-group">
    <label for="email"> Category: </label>
    <input type="text" name="category" class="form-control" id="email">
  </div>
  
  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control" rows="5" name="des" id="comment"></textarea>
</div>
  
  <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
</form>

<script>
  
function validateform(){
  var x = document.forms['categoryform']['category'].value;
  if (x=="") {
    alert('Carefully Fillup !');
    return false;
  }
   
}

</script>
	
</div>

<?php
include('include/footer.php')

?>
<!-- -->

<?php

include('database/connection.php');
if (isset($_POST['submit'])) {

  $category_name=$_POST['category'];
  $des=$_POST['des'];
  
  $query=mysqli_query($conn,"insert into category(category_name,des)values('$category_name','$des')");

  if ($query) {
    echo "<script> alert('Category Add Successfully')</script>";

    echo "<script>window.location='http://localhost/newsportal/category.php';</script>";

  }else{
    echo "<script> alert('Please Try Again')</script>";

  }
}


?>