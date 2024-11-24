<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION['role'] === 'User') {
        $id = $_SESSION['id'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

        $sql = "UPDATE users SET name='$name', mobile='$mobile', email='$email', address='$address', gender='$gender', dob='$dob', is_approved=0 WHERE id=$id";
        if ($conn->query($sql)) {
            echo "Profile updated successfully! Awaiting admin approval.";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Access Denied!";
    }
}
?>
