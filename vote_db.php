<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 

session_start();
require_once "config/connect_login.php";

if (isset($_POST['submit'])) {
    $stdid = $_POST['stdid'];
    $bvote = $_POST['bvote'];
    $gvote = $_POST['gvote'];
    $svote = $_POST['svote'];

    if (empty($stdid)){
        array_push($errors, "Username is required");
    }
    $stdid_check = "SELECT * FROM vote WHERE stdid = '$stdid'";
    $query = mysqli_query($conn, $stdid_check);
    $result = mysqli_fetch_assoc($query);

    if ($result){
        if ($result['stdid'] === $stdid){
            echo "<script>";
            echo "alert(' คุณได้ทำการโหวตไปแล้ว !');";
            echo "window.history.back();";
            echo "</script>";
        }
    }

        $sql = "INSERT INTO vote(stdid, bvote, gvote, svote)
            VALUES('$stdid', '$bvote', '$gvote', '$svote')";
            mysqli_query($conn, $sql);

            if ($sql) {
                $_SESSION['success'] = "Data has been inserted successfully";
                echo "<script>
                $(document).ready(function(){
                    Swal.fire({
                        title: 'สำเร็จ',
                        text: 'คุณได้ทำการโหวตเรียบร้อยแล้ว',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                });
                </script>";
                header("refresh:2; url=vote.php");
            } else {
                $_SESSION['error'] = "Data has not been inserted successfully";
                echo "<script>
                $(document).ready(function(){
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'คุณได้ทำการโหวตไปแล้ว',
                      });
                });
                </script>";
                header("location: vote.php");
            }
        }
?>