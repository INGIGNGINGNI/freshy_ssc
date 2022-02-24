<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<?php
    $id=$_POST['id'];

    $con=mysqli_connect("localhost","root","","ssc_db");
    $query="SELECT * FROM freshmen_girl WHERE id=$id";
    $result=mysqli_query($con,$query);

    while ($k=mysqli_fetch_array($result)) {
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="portfolio-modal-title font-weight-bold text-primary mb-0"><?= $k['fos'];?></h2>
                    <hr>
                    <img class="img-fluid rounded mb-3" src= dashboard/uploads/<?= $k['img'];?> width="350" height="350">
                    <h2 class="portfolio-modal-title font-weight-bold text-primary mt-1"><?= $k['position'];?> <?= $k['nickname'];?></h2>
                    <h2 class="portfolio-modal-title font-weight-bold text-primary mt-2"><?= $k['firstname'];?> <?= $k['lastname'];?></h2>
                    <h4 class="my-4">‷ <?= $k['description'];?> ‴</h4>
                    
                    <button class="btn btn-primary" href="showboy.php" data-bs-dismiss="modal">
                        <i class="fas fa-times fa-fw"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
        <?php } ?>