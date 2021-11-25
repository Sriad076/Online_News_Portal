
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
	

	<form action="addsubcategory.php" method="post" name="categoryform"onsubmit="return validateform() ">
		<h1>Add Sub-Categories</h1>
		<hr>
  <div class="form-group">
    <label for="email"> Sub-Category: </label>
    <input type="text" name="categories" class="form-control" id="email">
  </div>
  
  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control" rows="5" name="des" id="comment"></textarea>
</div>
  
  <input type="submit" name="submit" class="btn btn-primary" value="Add Sub-Category">
</form>

<script>
  
function validateform(){
  var x = document.forms['categoryform']['categories'].value;
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

  $subcategory_name=$_POST['categories'];
  $des=$_POST['des'];
  
  $query=mysqli_query($conn,"insert into subcategory(subcategory_name,des)values('$subcategory_name','$des')");

  if ($query) {
    echo "<script> alert('Sub-Category Add Successfully')</script>";

    echo "<script>window.location='http://localhost/newsportal/categories.php';</script>";

  }else{
    echo "<script> alert('Please Try Again')</script>";

  }
}


?>