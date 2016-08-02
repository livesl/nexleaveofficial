<?php

//session_start();
//include_once '../Control/ConstantData.php';
if (isset($_SESSION[ConstantData::$Session_User])) {


    if (isset($_REQUEST['cat']) && isset($_POST['name'])) {
      
        $target_dir = "../uploads/";//save path


       // $linkadd = "../HomeCategory.php";
        $size = 500000 * 2;//image size 1mb

        $id = $_POST['id'];
        $cat = $_POST['cat'];
        $name = $_POST['name'];
        $imgname = $_POST["filename"];

        $onsite = $_POST['show'];
        $_SESSION["msg"] = "";


//category & name can't update, if want delete & enter new one


        if (empty($_FILES['file1']['name']) && $id != "0") {// imge not update
            // No file was selected for upload, your (re)action goes here
//            $sql = "update cat_image set "
//                    . "description='" . $name . "' ,"
//                    . "onsite='" . getStateNo($onsite) . "' "
//                    . " where id='" . $id . "' ";
//
//            if (mysqli_query($conn, $sql)) {
//                $_SESSION["msg"] = "Home Page Category Image Saved Successfully  Name - " . $name;
//            } else {
//                $_SESSION["msg"] = "Error Occur when Home Page Category Image Save,Please Check ! ";
//            }
        } else {


            $target_file = $target_dir . basename($_FILES["file1"]["name"]);

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $_SESSION["msg"] = "Error Occur when Home Page Category Image Save,This Image not Type JPG,JPEG,PNG or GIF ! ";
            } else {

                $imageInformation = getimagesize($_FILES['file1']['tmp_name']);
                $imageWidth = $imageInformation[0]; //Contains the Width of the Image
                $imageHeight = $imageInformation[1]; //Contains the Height of the Image

                if ($imageWidth != 200 && $imageHeight != 200) {
                    $_SESSION["msg"] = "Error Occur when Home Page Category Image Save,This Image width & Height not Match ! ";
                } else {

//                 
                    if ($id == "0") { // save
                        if ($_FILES["file1"]["size"] < $size && $_FILES["file1"]["size"] != 0) {

                            if (isnotAlreadyExist($conn, $cat)) {

                                $temp = explode(".", $_FILES["file1"]["name"]);
                                $newfilename = round(microtime(true)) . '.' . end($temp);
                                $url = "../." . $target_dir . $newfilename; //image save url
                                $url_original = $target_dir . $newfilename;


                                $sql = "insert into cat_image (id,category_id,description,img,onsite,status) values ('" . getMaxID($conn, "cat_image") . "','" . $cat . "',"
                                        . "'" . $name . "',"
                                        . "'" . $url_original . "',"
                                        . "'" . getStateNo($onsite) . "','" . ConstantData::$ACTIVE_Status . "')";


                                if (mysqli_query($conn, $sql)) {
                                    move_uploaded_file($_FILES["file1"]["tmp_name"], $url);
                                    $_SESSION["msg"] = "Home Page Category Image Saved Successfully";
                                } else {
                                    $_SESSION["msg"] = "Error Occur when Home Page Category Image Save,Please Check ! ";
                                }
                            } else {

                                $_SESSION["msg"] = "Error Occur when Home Page Category Image Save,This Home Page Category Image already exist ! ";
                            }
                        } else {
                            $_SESSION["msg"] = "Error Occur ,Image size must be lower than 1MB & Choose correct Image! ";
                        }
                    } else { // update
                        if ($_FILES["file1"]["size"] < $size && $_FILES["file1"]["size"] != 0) {

                            $temp = explode(".", $_FILES["file1"]["name"]);
                            $newfilename = round(microtime(true)) . '.' . end($temp);
                            $url = "../." . $target_dir . $newfilename; //image save url
                            $url_original = $target_dir . $newfilename;




                            $sql = "update cat_image set "
                                    . "description='" . $name . "' ,img='" . $url_original . "',"
                                    . "onsite='" . getStateNo($onsite) . "' "
                                    . " where id='" . $id . "' ";



                            if (mysqli_query($conn, $sql)) {
                                if (file_exists("../." . $target_dir . $imgname)) {
                                    unlink("../." . $target_dir . $imgname);
                                }
                                move_uploaded_file($_FILES["file1"]["tmp_name"], $url);
                                $_SESSION["msg"] = "Home Page Category Image Saved Successfully  Name - " . $name;
                            } else {
                                $_SESSION["msg"] = "Error Occur when Home Page Category Image Save,Please Check ! ";
                            }
                        } else {
                            $_SESSION["msg"] = "Error Occur ,Image size must be lower than 1MB & Choose correct Image! ";
                            $linkadd = "../HomeCategory.php?id=" . $id;
                        }
                    }
                }
            }
        }

        mysqli_close($conn);
        header("location: " . $linkadd);
    }
} else {

    header("location: ../HomeCategory.php");
}

function getMaxID($con, $table) {

    $query = mysqli_query($con, "SELECT MAX(id) FROM " . $table);

    $id = 0;

    if ($row = mysqli_fetch_assoc($query)) {

        if ($row["MAX(id)"] == "") {
            $id = 1;
        } else {

            $id = $row["MAX(id)"];
            $id++;
        }
    }

    return $id;
}

function isnotAlreadyExist($con, $cat) {

    $query = mysqli_query($con, "SELECT
cat_image.id
FROM
cat_image
WHERE
cat_image.category_id = '" . $cat . "' AND
cat_image.`status` = '" . ConstantData::$ACTIVE_Status . "'
");

    $bol = TRUE;

    if ($row = mysqli_fetch_array($query)) {

        if ($row["0"] != "") {

            $bol = FALSE;
        }
    }

    return $bol;
}

function getStateNo($st) {

    if ($st == ConstantData::$Active) {
        return ConstantData::$ACTIVE_Status;
    } else if ($st == ConstantData::$Deactive) {
        return ConstantData::$DEACTIVE_Status;
    }
}
?>

