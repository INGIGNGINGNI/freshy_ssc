<?php 

    session_start();

    require_once "config/connection.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deleteboy = $conn->query("DELETE FROM freshmen_boy WHERE id = $delete_id");
        $deleteboy->execute();

        if ($deleteboy) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=admin_index.php");
        }
        
    }

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletegirl = $conn->query("DELETE FROM freshmen_girl WHERE id = $delete_id");
        $deletegirl->execute();

        if ($deletegirl) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=admin_index.php");
        }
        
    }

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM champion WHERE id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=admin_index.php");
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/sscicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@500&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>
<body>
    <div class="modal fade" id="boyModal" tabindex="-1" aria-labelledby="boyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="boyModalLabel">Add Freshmen Boy contestant</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insertboy_db.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">First Name :</label>
                    <input type="text" required class="form-control" name="firstname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Last Name :</label>
                    <input type="text" required class="form-control" name="lastname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Nick Name :</label>
                    <input type="text" required class="form-control" name="nickname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Field of study :</label>
                    <input type="text" required class="form-control" name="fos">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Description :</label>
                    <input type="text" required class="form-control" name="description">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Position :</label>
                    <input type="text" required class="form-control" name="position">
                </div>
                <div class="mb-3">
                    <label for="img" class="col-form-label">Image :</label>
                    <input type="file" required class="form-control" id="imgInput" name="img">
                    <img loading="lazy" width="100%" id="previewImg" alt="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Freshmen Boy Contestant</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#boyModal" data-bs-whatever="@mdo">Add contestant</button>
            </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">NickName</th>
                    <th scope="col">Field of study</th>
                    <th scope="col">Description</th>
                    <th scope="col">Position</th>
                    <th scope="col">Img</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM freshmen_boy");
                    $stmt->execute();
                    $conts = $stmt->fetchAll();

                    if (!$conts) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($conts as $cont)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $cont['id']; ?></th>
                        <td><?php echo $cont['firstname']; ?></td>
                        <td><?php echo $cont['lastname']; ?></td>
                        <td><?php echo $cont['nickname']; ?></td>
                        <td><?php echo $cont['fos']; ?></td>
                        <td><?php echo $cont['description']; ?></td>
                        <td><?php echo $cont['position']; ?></td>
                        <td width="100px"><img class="rounded" width="100%" src="uploads/<?php echo $cont['img']; ?>" alt=""></td>
                        <td>
                            <a href="editboy_db.php?id=<?php echo $cont['id']; ?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $cont['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
    
    <div class="modal fade" id="girlModal" tabindex="-1" aria-labelledby="girlModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="girlModalLabel">Add Freshmen Girl contestant</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insertgirl_db.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">First Name :</label>
                    <input type="text" required class="form-control" name="firstname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Last Name :</label>
                    <input type="text" required class="form-control" name="lastname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Nick Name :</label>
                    <input type="text" required class="form-control" name="nickname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Field of study :</label>
                    <input type="text" required class="form-control" name="fos">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Description :</label>
                    <input type="text" required class="form-control" name="description">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Position :</label>
                    <input type="text" required class="form-control" name="position">
                </div>
                <div class="mb-3">
                    <label for="img" class="col-form-label">Image :</label>
                    <input type="file" required class="form-control" id="imgInput2" name="img">
                    <img loading="lazy" width="100%" id="previewImg2" alt="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Freshmen Girl Contestant</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#girlModal" data-bs-whatever="@mdo">Add contestant</button>
            </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">NickName</th>
                    <th scope="col">Field of study</th>
                    <th scope="col">Description</th>
                    <th scope="col">Position</th>
                    <th scope="col">Img</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM freshmen_girl");
                    $stmt->execute();
                    $conts = $stmt->fetchAll();

                    if (!$conts) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($conts as $cont)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $cont['id']; ?></th>
                        <td><?php echo $cont['firstname']; ?></td>
                        <td><?php echo $cont['lastname']; ?></td>
                        <td><?php echo $cont['nickname']; ?></td>
                        <td><?php echo $cont['fos']; ?></td>
                        <td><?php echo $cont['description']; ?></td>
                        <td><?php echo $cont['position']; ?></td>
                        <td width="100px"><img class="rounded" width="100%" src="uploads/<?php echo $cont['img']; ?>" alt=""></td>
                        <td>
                            <a href="editgirl_db.php?id=<?php echo $cont['id']; ?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $cont['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

    <div class="modal fade" id="championModal" tabindex="-1" aria-labelledby="championModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="championModalLabel">Add Freshmen 2020</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insertchampion_db.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">First Name :</label>
                    <input type="text" required class="form-control" name="firstname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Last Name :</label>
                    <input type="text" required class="form-control" name="lastname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">NickName :</label>
                    <input type="text" required class="form-control" name="nickname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Field of study :</label>
                    <input type="text" required class="form-control" name="fos">
                </div><div class="mb-3">
                    <label for="firstname" class="col-form-label">Position :</label>
                    <input type="text" required class="form-control" name="position">
                </div>
                <div class="mb-3">
                    <label for="img" class="col-form-label">Image:</label>
                    <input type="file" required class="form-control" id="imgInput3" name="img">
                    <img loading="lazy" width="100%" id="previewImg3" alt="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Freshmen 2020</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#championModal" data-bs-whatever="@mdo">Add freshmen 2020</button>
            </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">NickName</th>
                    <th scope="col">Field of study</th>
                    <th scope="col">Position</th>
                    <th scope="col">Img</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM champion");
                    $stmt->execute();
                    $champs = $stmt->fetchAll();

                    if (!$champs) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($champs as $champ)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $champ['id']; ?></th>
                        <td><?php echo $champ['firstname']; ?></td>
                        <td><?php echo $champ['lastname']; ?></td>
                        <td><?php echo $champ['nickname']; ?></td>
                        <td><?php echo $champ['fos']; ?></td>
                        <td><?php echo $champ['position']; ?></td>
                        <td width="100px"><img class="rounded" width="100%" src="uploads/<?php echo $champ['img']; ?>" alt=""></td>
                        <td>
                            <a href="editchampion_db.php?id=<?php echo $champ['id']; ?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $champ['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

    </script>
    <script>
        let imgInput2 = document.getElementById('imgInput2');
        let previewImg2 = document.getElementById('previewImg2');

        imgInput2.onchange = evt => {
            const [file] = imgInput2.files;
                if (file) {
                    previewImg2.src = URL.createObjectURL(file)
            }
        }

    </script>
    <script>
        let imgInput3 = document.getElementById('imgInput3');
        let previewImg3 = document.getElementById('previewImg3');

        imgInput3.onchange = evt => {
            const [file] = imgInput3.files;
                if (file) {
                    previewImg3.src = URL.createObjectURL(file)
            }
        }

    </script>
</body>
</html>
