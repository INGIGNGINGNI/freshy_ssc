<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
    session_start();
    require_once "connection.php";

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $nickname = $_POST['nickname'];
        $fos = $_POST['fos'];
        $description = $_POST['description'];
        $position = $_POST['position'];
        $img = $_FILES['img'];

        $img2 = $_POST['img2'];
        $upload = $_FILES['img']['name'];

        if ($upload != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
            $filePath = 'uploads/'.$fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($img['size'] > 0 && $img['error'] == 0) {
                   move_uploaded_file($img['tmp_name'], $filePath);
                }
            }

        } else {
            $fileNew = $img2;
        }

        $sql = $conn->prepare("UPDATE freshmen_boy SET firstname = :firstname, lastname = :lastname, 
        nickname = :nickname, fos = :fos, description = :description, position = :position, img = :img WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":firstname", $firstname);
        $sql->bindParam(":lastname", $lastname);
        $sql->bindParam(":nickname", $nickname);
        $sql->bindParam(":fos", $fos);
        $sql->bindParam(":description", $description);
        $sql->bindParam(":position", $position);
        $sql->bindParam(":img", $fileNew);
        $sql->execute();

        if ($sql) {
            $_SESSION['success'] = "Data has been updated successfully";
            echo "<script>
                $(document).ready(function(){
                    Swal.fire({
                        title: 'สำเร็จ',
                        text: 'คุณได้ทำการแก้ไขข้อมูลผู้เข้าประกวดเรียบร้อยแล้ว',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                });
                </script>";
                header("refresh:2; url=freshmenboy.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: freshmenboy.php");
        }
    }
