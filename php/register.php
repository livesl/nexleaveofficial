<?php

session_start();
include '../db/config.php';

$target_dir = "../uploads/"; //save path
// $linkadd = "../HomeCategory.php";
$size = 500000 * 2; //image size 1mb


$first = $_POST['first'];
$last = $_POST['last'];
$tp = $_POST['tp'];
$pass = $_POST['pass'];
$passmatch = $_POST['passmatch'];
$nic = $_POST['nic'];
$dob = $_POST['dob'];
$eduqlf = $_POST['eduqlf'];
$proqlf = $_POST['proqlf'];
$salory = $_POST['salory'];
//$image = $_POST['image_user'];
$status = "1";


$target_file = $target_dir . basename($_FILES["file"]["name"]);

$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    echo 'Error Occur when Home Page Category Image Save,This Image not Type JPG,JPEG,PNG or GIF ! ';
} else {

    $imageInformation = getimagesize($_FILES['file']['tmp_name']);
    $imageWidth = $imageInformation[0]; //Contains the Width of the Image
    $imageHeight = $imageInformation[1]; //Contains the Height of the Image

    if ($imageWidth != 200 && $imageHeight != 200) {
        echo "Error Occur when  Image Save,This Image width & Height not Match ! ";
    } else {

//                 

        if ($_FILES["file"]["size"] < $size && $_FILES["file"]["size"] != 0) {



            $temp = explode(".", $_FILES["file"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $url = $target_dir . $newfilename; //image save url



            $sql = "INSERT INTO register(first,last,tp,pass,confirmpass,basic_salory,education_qualifications,professional_qualifications,"
                    . "imageurl,nic,dob,status)values('" . $first . "','" . $last . "','" . $tp . "','" . $pass . "','" . $passmatch . "','" . $salory . "','" . $eduqlf . "','" . $proqlf . "','" . $url . "','" . $nic . "','" . $dob . "','" . $status . "') ";

            echo 'insert query';

            if (mysqli_query($db, $sql)) {
                move_uploaded_file($_FILES["file"]["tmp_name"], $url);
                echo " Image Saved Successfully";
            } else {
                echo"Error Occur when Image Save,Please Check ! ";
            }
        } else {
            echo"Error Occur ,Image size must be lower than 1MB & Choose correct Image! ";
        }
//        } else { // update
//            if ($_FILES["file1"]["size"] < $size && $_FILES["file1"]["size"] != 0) {
//
//                $temp = explode(".", $_FILES["file1"]["name"]);
//                $newfilename = round(microtime(true)) . '.' . end($temp);
//                $url = "../." . $target_dir . $newfilename; //image save url
//                $url_original = $target_dir . $newfilename;
//
//
//
//
//                $sql = "update cat_image set "
//                        . "description='" . $name . "' ,img='" . $url_original . "',"
//                        . "onsite='" . getStateNo($onsite) . "' "
//                        . " where id='" . $id . "' ";
//
//
//
//                if (mysqli_query($conn, $sql)) {
//                    if (file_exists("../." . $target_dir . $imgname)) {
//                        unlink("../." . $target_dir . $imgname);
//                    }
//                    move_uploaded_file($_FILES["file1"]["tmp_name"], $url);
//                    $_SESSION["msg"] = "Home Page Category Image Saved Successfully  Name - " . $name;
//                } else {
//                    $_SESSION["msg"] = "Error Occur when Home Page Category Image Save,Please Check ! ";
//                }
//            } else {
//                $_SESSION["msg"] = "Error Occur ,Image size must be lower than 1MB & Choose correct Image! ";
//                $linkadd = "../HomeCategory.php?id=" . $id;
//            }
//        }
    }
}




//$res =;
//echo $res;
//if ($db->query($sql) == TRUE) {
//    echo "1";
//} else {
//
//    echo "Error: " . $sql . "<br>" . $db->error;
//}
mysqli_close($db);
?>

