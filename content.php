<!-- FAKE AJAX CONTENT -->
   <?php 
    require('db.php');
    $id = $_GET['id'];
    $sql = mysqli_query($con,"SELECT * FROM `users` where `id` = '$id'");
    $data = $query = mysqli_fetch_array($sql)
       
?>

<div class="row">
    <div class="col-sm-6">

        <div id="carousel-1246" class="carousel slide">
            
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo $data[2];?>" class="img-responsive" />
                    <div class="carousel-caption">
                        <?php echo $data[1];?>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-1246" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-1246" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="col-sm-6">
        <h2><?php echo $data[1];?></h2>

        <p><?php echo $data[3];?></p>
    </div>
</div>