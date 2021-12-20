<?php
 error_reporting(0);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico"> 

    <title>Online News </title>

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
            <a class="text-muted" href="#"> <div id="google_translate_element"></div></a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Online News Portal</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">

          
           <form action="search.php" method="post">
         <div class="input-group sm-3">
         
          <input type="text" name="search" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <button class="btn btn-success" name="submit" type="submit">Go</button> 
          </div>
        </div>

      </form>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        
        </nav>
      </div>

     <div class="card" style="width:100%; height:200px;" >
      <!--<img class="card-img-top" src="https://www.facebook.com/1907575036188754/photos/a.1907999952812929/1907999939479597" alt="Card image" height="200" > -->
      
     <div class="card-img-overlay"> 
        <h4 class="card-title align-items-center">Online News Portal</h4>
        <p class="card-text">Digital platform for NEWS 24/7</p>
       
      </div>
    </div>

      <div class="row mb-2">
    <?php
    include('database/connection.php');
     $query1 =mysqli_query($conn,"select * from news order by id desc limit 1,2 ");
      while($row=mysqli_fetch_array($query1)){
         $category=$row['category'];
         
         $date=$row['date'];
         $title=$row['title'];
         $thumbnail=$row['thumbnail'];

      

    ?>

        
      <?php } ?>
        
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            
          </h3>


          <?php

       include('database/connection.php');

           $page=$_GET['page'];
           if($page=="" || $page==1){
            $page1=0;
           }
           else{
              $page1=($page*5)-5;

           }
           
        $query=mysqli_query($conn,"select * from news limit $page1,5 ");
         while($row=mysqli_fetch_array($query)){
          ?>
          <div class="blog-post">
            <h4 class="blog"> <a href="single_page.php?single=<?php echo $row['id'];?>"><?php echo $row['title']; ?> </a></h4>
            <p class="blog-post-meta"><?php echo $row['date']; ?> <a href="#"><?php echo $row['category'];?></a></p>

            <p><img class="img img-thumbnail"  src="images/<?php echo $row['thumbnail'];?>"  width="250" height="200" > </p>
            <hr>
            
            <blockquote>
              <?php echo substr($row['description'],0,300 ) ;?>
               <a href="single_page.php?single=<?php echo $row['id'];?> " class="btn btn-primary btn-sm">Read More</a>
            </blockquote>
            
              
            </ol>
           
          </div><!-- /.blog-post -->
  
          <?php } ?>

           
             <ul class="pagination">
               <li class="page-item disabled">
                 <a href="#" class="page-link" >Prev</a>
               </li>
              <?php

       $sql=mysqli_query($conn,"select * from news");
       $count=mysqli_num_rows($sql);
       $a=$count/5;
        ceil($a);
        for ($b=1; $b <=$a ; $b++) { 
          ?>
      
             
         <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $b;?>"><?php echo $b; ?></a></li>
          
       
          <?php 
        }
       ?>
                <li class="page-item disabled">
                 <a href="#" class="page-link" >Next</a>
               </li>
       </ul>


          

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Welcome to our Online news portal. <em>SE Lab Project Summer-2021.</em> This a basic Online news channel for all kinds of people.As the pandemic situation is going on so we stay home and read online news.  .</p>
          </div>

           <div class="p-3">
            <h4 class="font-italic">Categories</h4>
            <hr>
            <ol class="list-unstyled mb-0">
               <?php
               include('database/connection.php');
                $query1=mysqli_query($conn,"select * from category");
                while($row=mysqli_fetch_array($query1)){

                

               ?>
              <li><a href="category_page.php?single=<?php echo$row['category_name'];  ?>"><?php echo $row['category_name']; ?></a></li>
              <?php } ?>
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Find us</h4>
            <ol class="list-styled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Instragram</a></li> 
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-styled mb-0">
              <li><a href="#">March 2020</a></li>
              <li><a href="#">February 2020</a></li>
              <li><a href="#">January 2020</a></li>
              <li><a href="#">December 2020</a></li>
              <li><a href="#">November 2020</a></li>
              <li><a href="#">October 2020</a></li>
              
            </ol>
          </div>


          <div class="p-3">
            <h4 class="font-italic">Contact Us</h4>
            <ol class="list-unstyled">
              <li><a href="#"></a>Ashikur Rahman</li>
              <li><a href="#"></a>Motijheel C/A ,Dhaka-1209</li>
              <li><a href="#"></a>01863-831747</li>
              <li><a href="#"></a>aashikrahman888@gmail.com</li>
              
            </ol>
          </div>  
        </aside><!-- /.blog-sidebar -->

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
