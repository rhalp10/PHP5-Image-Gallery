<?php 
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="http://fonts.googleapis.com/css?family=Armata" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="css/jquery.gridder.min.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gallery.php">Gallery</a>
      </li>
      
  </div>
</nav>
<style type="text/css">
a {
  padding: 5px;
}

</style>


        <div class="container">

            <ul class="gridder">
              <?php 
               $sql = mysqli_query($con,"SELECT * FROM `users`");
              while ($data = mysqli_fetch_array($sql))
              {
                ?>
                <li class="gridder-list" data-griddercontent="content.php?id=<?php echo $data[0];?>">
                    <img src="<?php echo $data[2];?>" class="img-fluid">
                </li>
                
                <?php
              }
              ?>
                
            </ul>
        </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
   
    <script src="js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/jquery.gridder.js"></script>
        <script>
            jQuery(document).ready(function ($) {

                // REMOVE AND ADD CLICK EVENT 
                $('.doAddItem').on('click', function () {
                    $(".gridder").data('gridderExpander').gridderAddItem('TEST');
                });

                // Call Gridder
                $(".gridder").gridderExpander({
                    scrollOffset: 60,
                    scrollTo: "panel", // "panel" or "listitem"
                    animationSpeed: 400,
                    animationEasing: "easeInOutExpo",
                    onStart: function () {
                        console.log("Gridder Inititialized");
                    },
                    onExpanded: function (object) {
                        console.log("Gridder Expanded");
                    },
                    onChanged: function (object) {
                        console.log("Gridder Changed");
                    },
                    onClosed: function () {
                        console.log("Gridder Closed");
                    }
                });
            });
        </script>

  </body>
</html>