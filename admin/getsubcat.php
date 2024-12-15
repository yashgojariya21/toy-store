<?php
session_start();
if (isset($_SESSION["uname"])) {
    include_once('include/config.php');
    $id = $_REQUEST['id'];
    $qry = "select * from subcategories where catid='" . $id . "'";
    $result = mysqli_query($conn, $qry) or exit("Sub Category select fail" . mysqli_error($conn));
    $output = "";
    while ($row = mysqli_fetch_array($result)) {

        $output .= "<option value='" . $row['id'] . "'>" . $row['subcatname'] . "</option>";
    }
    echo $output;
}
?>