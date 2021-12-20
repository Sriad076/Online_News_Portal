
<!--  SE Lab Project  
 
      After Mid  -->


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Search Result</title>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    
  </head>

  <body>   

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="#"></a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">SEARCH RESULT</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
           
          </div>
        </div>
      </header>

      
   

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            
          </h3>

        <?php
       include('database/connection.php');
        if(isset($_POST['submit'])){
         $search=$_POST['search'];

         $query=mysqli_query($conn,"select * from news where title like '%$search%'");
         while($row=mysqli_fetch_array($query)){

         
            $title=$row['title'];
            $date=$row['date'];
            
            $thumbnail=$row['thumbnail'];
            $description=$row['description'];
            $category=$row['category'];
         
          ?>  
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $title; ?></h2>
            <p class="blog-post-meta"><?php echo $date; ?> <a href="#"><?php echo $category;?></a></p>

            <p><img class="img img-thumbnail" style="height: 10%;" src="images/<?php echo $thumbnail;?>"  > </p>
            <hr>
            
            <blockquote>
              <?php echo $description ;?>
              
            </blockquote>
            
              
            </ol>
           
          </div><!-- /.blog-post -->
         <?php }} ?>
        
        </div><!-- /.blog-main -->

        

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
      
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
