<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 

session_start();
require_once "connection.php";

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $fos = $_POST['fos'];
    $description = $_POST['description'];
    $position = $_POST['position'];
    $img = $_FILES['img'];

        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'uploads/'.$fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                if (move_uploaded_file($img['tmp_name'], $filePath)) {
                    $sql = $conn->prepare("INSERT INTO missile(firstname, lastname, nickname, fos, description, position, img) 
                    VALUES(:firstname, :lastname, :nickname, :fos, :description, :position, :img)");
                    $sql->bindParam(":firstname", $firstname);
                    $sql->bindParam(":lastname", $lastname);
                    $sql->bindParam(":nickname", $nickname);
                    $sql->bindParam(":fos", $fos);
                    $sql->bindParam(":description", $description);
                    $sql->bindParam(":position", $position);
                    $sql->bindParam(":img", $fileNew);
                    $sql->execute();

                    if ($sql) {
                        $_SESSION['success'] = "Data has been inserted successfully";
                        echo "<script>
                        $(document).ready(function(){
                            Swal.fire({
                                title: 'สำเร็จ',
                                text: 'คุณได้ทำการเพิ่มข้อมูลผู้เข้าประกวดเรียบร้อยแล้ว',
                                icon: 'success',
                                timer: 5000,
                                showConfirmButton: false
                            });
                        });
                        </script>";
                        header("refresh:2; url=missile.php");
                    } else {
                        $_SESSION['error'] = "Data has not been inserted successfully";
                        header("location: index.php");
                    }
                }
            }
        }
}


?>