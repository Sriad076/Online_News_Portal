<?php
session_start();
if ($_SESSION['email']==true) {
  
}else
  header('location:admin_login.php');
  

include('include/header.php');

?>

<?php 

include('database/connection.php');
$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from news where id='$id' ");
while ($row=mysqli_fetch_array($query)) {
  
  $id=$row['id'];
    $title=$row['title'];
      $description=$row['description'];
        $date=$row['date'];
          $thumbnail=$row['thumbnail'];
            $category=$row['category'];

}
?>

<div style="margin-left:17%; width: 80%; ">
   <ul class ="breadcrumb">
       <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active"><a href="news.php">News</a></li>
      <li class="breadcrumb-item active">Add News</li>
    </ul>
  </div>

<div style="width: 70% ; margin-left: 25%;">
	
  
    

	 <form action="news_edit.php" method="post" enctype="multipart/form-data" name="categoryform"onsubmit="return validateform() ">
		<h1>Update News</h1>
		<hr>
  <div class="form-group">
    <label for="email"> Title: </label>
    <input type="text" value="<?php echo $title; ?>" name="title" class="form-control" id="email">
  </div>

  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control"  rows="5" name="description" id="comment"> <?php echo $description; ?> </textarea>
</div>

  <div class="form-group">
    <label for="email"> Date: </label>
    <input type="date" value="<?php echo $date; ?>" name="date" class="form-control" id="email">
  </div>
  
  
<div class="form-group">
    <label for="email"> Thumbnail: </label>
    <input type="file" value="<?php echo $thumbnail; ?>" name="thumbnail" class="form-control img-thumbnail" id="email">
    <img class="img img-thumbnail" src="images/<?php  echo $thumbnail; ?>" alt="" width="100" height="100">
  </div>

    <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"> 
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

  
  <input type="submit" name="submit" class="btn btn-primary" value="Update">
</form>

<script>
  
function validateform(){
  var x = document.forms['categoryform']['title'].value;
  var y = document.forms['categoryform']['description'].value;
  var z = document.forms['categoryform']['date'].value;
  var w= document.forms['categoryform']['category'].value;
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
include('include/footer.php');

?>
<?php 
include('database/connection.php');

include('database/connection.php');
if (isset($_POST['submit'])) {
  
  $id=$_POST['id'];
  $title=$_POST['title'];
       $description=$_POST['description'];
           $date=$_POST['date'];
               $thumbnail=$_FILES['thumbnail']['name'];
               $tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
                   $category=$_POST['category'];
              move_uploaded_file($tmp_thumbnail,"images/$thumbnail");

             $sql=mysqli_query($conn,"update news set title='$title',description='$description',date='$date',thumbnail='$thumbnail',category='$category' where id='$id' ");

    if (sql) {
      echo "<script> alert('news updated') </script> "; 
     

    echo "<script>window.location='http://localhost/newsportal/news.php';</script>"; 

      
    }else{
      echo "News Not Update";
    }

}

?>


