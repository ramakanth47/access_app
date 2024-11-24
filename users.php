<?php
include 'db.php';

$action = $_GET['action'];

if ($action === 'getUsers') {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
} elseif ($action === 'deleteUser') {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql)) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} elseif ($action === 'updateUser') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET name='$name', email='$email', mobile='$mobile', address='$address' WHERE id=$id";
    if ($conn->query($sql)) {
        echo "User updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


