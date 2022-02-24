<?php 
    session_start();
    if (!$_SESSION["username"]){
		Header("Location: loginAdmin.php");
	}
    
    require_once "connection.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deleteboy = $conn->query("DELETE FROM freshmen_boy WHERE id = $delete_id");
        $deleteboy->execute();

        if ($deleteboy) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:3; url=freshmenboy.php");
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SSC Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fab fa-dice-d6"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SSC Admin <sup>Freshmen</sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Contestant</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add Contestant</h6>
                        <a class="collapse-item" href="freshmenboy.php">Freshmen Boy</a>
                        <a class="collapse-item" href="freshmengirl.php">Freshmen Girl</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Other News</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add Champions:</h6>
                        <a class="collapse-item" href="utilities-animation.html">Freshmen 2020</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Profile of Freshmen Boy</h1>
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit data</h6>
                                </div>
                                <div class="card-body">
                                <form action="editboy_db.php" method="post" enctype="multipart/form-data">
                                    <?php
                                        if (isset($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $stmt = $conn->query("SELECT * FROM freshmen_boy WHERE id = $id");
                                                $stmt->execute();
                                                $data = $stmt->fetch();
                                        }
                                    ?>
                                        <div class="mb-3">
                                            <label for="id" class="col-form-label">ID:</label>
                                            <input type="text" readonly value="<?php echo $data['id']; ?>" required class="form-control" name="id" >
                                            <label for="firstname" class="col-form-label">First Name:</label>
                                            <input type="text" value="<?php echo $data['firstname']; ?>" required class="form-control" name="firstname" >
                                            <input type="hidden" value="<?php echo $data['img']; ?>" required class="form-control" name="img2" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="firstname" class="col-form-label">Last Name:</label>
                                            <input type="text" value="<?php echo $data['lastname']; ?>" required class="form-control" name="lastname">
                                        </div>
                                        <div class="mb-3">
                                            <label for="firstname" class="col-form-label">Nickname :</label>
                                            <input type="text" value="<?php echo $data['nickname']; ?>" required class="form-control" name="nickname">
                                        </div>
                                        <div class="mb-3">
                                            <label for="firstname" class="col-form-label">Field of study :</label>
                                            <input type="text" value="<?php echo $data['fos']; ?>" required class="form-control" name="fos">
                                        </div>
                                        <div class="mb-3">
                                            <label for="firstname" class="col-form-label">Description :</label>
                                            <input type="text" value="<?php echo $data['description']; ?>" required class="form-control" name="description">
                                        </div>
                                        <div class="mb-3">
                                            <label for="firstname" class="col-form-label">Position:</label>
                                            <input type="text" value="<?php echo $data['position']; ?>" required class="form-control" name="position">
                                        </div>
                                        <div class="mb-3">
                                            <label for="img" class="col-form-label">Image:</label>
                                            <input type="file" class="form-control" id="imgInput" name="img">
                                            <img width="100%" src="uploads/<?php echo $data['img']; ?>" id="previewImg" alt="">
                                        </div>
                                        <hr>
                                        <a href="freshmenboy.php" class="btn btn-secondary">Back</a>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Contestant Freshmen Boy 2021</h6>
                                </div>
                                <div class="card-body">
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
                                                        <a href="editboy_db.php?id=<?php echo $cont['id']; ?>" class="btn btn-warning btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-exclamation-triangle"></i>
                                                            </span>
                                                            <span class="text">Edit</span>
                                                        </a>
                                                        <a data-id="<?php echo $cont['id']; ?>" href="?delete=<?php echo $cont['id']; ?>" class="btn btn-danger btn-icon-split delete-btn">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text">Delete</span>
                                                        </a>
                                                        <!-- <a href="editboy_db.php?id=<?php echo $cont['id']; ?>" class="btn btn-warning">Edit</a> -->
                                                        <!-- <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $cont['id']; ?>" class="btn btn-danger">Delete</a> -->
                                                    </td>
                                                </tr>
                                            <?php }  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Science Student Club 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="loginform.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        $('.delete-btn').click(function(e){
            var id = $(this).data('id');
            e.preventDefault();
            deleteConfirm(id);
        });

        function deleteConfirm(id){
            Swal.fire({
                title: 'Are you sure ?',
                text: 'It will be deleted permanently!',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it !',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {[
                        $.ajax( {
                            url: 'freshmenboy.php',
                            type: 'GET',
                            data: 'delete=' + id
                        })
                        .done(function() {
                            Swal.fire({
                                title: 'Success',
                                text: 'Data deleted successfully',
                                icon: 'success'
                            }).then(() => {
                                document.location.href = 'freshmenboy.php';
                            })
                        })
                        .fail(function() {
                            Swal.fire('Oops...', 'Something went wrong with ajax!', 'error');
                            window.location.reload();
                        })
                    ]})
                }
            })
        }
    </script>

</body>

</html>