<?php
session_start();
if ($_SESSION['email']==true) {
  
}else
  header('location:admin_login.php');
  $page='prductt';

include('include/header.php');

?>
<div style="margin-left:17%; width: 80%; ">
   <ul class ="breadcrumb">
       <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active"><a href="news.php">News</a></li>
      <li class="breadcrumb-item active">Add News</li>
    </ul>
  </div>

<div style="width: 70% ; margin-left: 25%;">
	
  
    

	 <form action="AddNews.php" method="post" enctype="multipart/form-data" name="categoryform"onsubmit="return validateform() ">
		<h1>Add News</h1>
		<hr>
  <div class="form-group">
    <label for="email"> Title: </label>
    <input type="text" name="title" class="form-control" id="email">
  </div>

  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control" rows="5" name="description" id="comment"></textarea>
</div>

  <div class="form-group">
    <label for="email"> Date: </label>
    <input type="date" name="date" class="form-control" id="email">
  </div>
  
  
<div class="form-group">
    <label for="email"> Thumbnail: </label>
    <input type="file" name="thumbnail" class="form-control img-thumbnail" id="email">
  </div>

   <!-- Choose Category -->

  <div class="form-group">
    <label for="email"> Category: </label>
    <select class="form-control" name="category"> 

    <?php
      include('database/connection.php');
      $query=mysqli_query($conn,"select * from category");
      while ($row=mysqli_fetch_array($query)) {        
    
    ?>
      <option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?> </option>
      
    <?php } ?>
      </select>
  </div>

  <!-- Choose Sub-Category -->

  <div class="form-group">
    <label for="email"> Sub-Category: </label>
    <select class="form-control" name="categories"> 

    <?php
      include('database/connection.php');
      $query=mysqli_query($conn,"select * from subcategory");
      while ($row=mysqli_fetch_array($query)) {        
    
    ?>
      <option value="<?php echo $row['subcategory_name'];?>"><?php echo $row['subcategory_name'];?> </option>
      
    <?php } ?>
      </select>
  </div>

  
  <input type="submit" name="submit" class="btn btn-primary" value="Add News">
</form>

<script>
  
function validateform(){
  var x = document.forms['categoryform']['title'].value;
  var y = document.forms['categoryform']['description'].value;
  var z = document.forms['categoryform']['date'].value;
  var w= document.forms['categoryform']['category'].value;
  var a= document.forms['categoryform']['categories'].value;
  if (x=="") {
    alert('Title must be filled out!');
    return false;
  }
  if (y=="") {
    alert('Description must be filled out!');
    return false;
  }
  
   
}

</script>
	
</div>
<?php
include('include/footer.php')

?>
<?php 
include('database/connection.php');
if (isset($_POST['submit'])) {
  $title=$_POST['title'];
       $description=$_POST['description'];
           $date=$_POST['date'];
               $thumbnail=$_FILES['thumbnail']['name'];
               $tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
                   $category=$_POST['category'];
                   $subcategory=$_POST['subcategory'];
              move_uploaded_file($tmp_thumbnail,"images/$thumbnail");

$query=mysqli_query($conn,"insert into news(title,description,date,category,subcategory,thumbnail)values('$title','$description','$date','$category','$subcategory','$thumbnail')");

   if ($query) {
     echo "<script>alert('News Uploaded Successfully !!') </script>";
     echo "<script>window.location='http://localhost/newsportal/news.php';</script>";
   }else{echo "<script>alert('Please Try Again !!') </script>";}

}


?>


