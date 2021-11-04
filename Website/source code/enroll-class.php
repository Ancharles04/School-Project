<?php
require_once('includes/connection.php');
$msg = '';
if (isset($_POST['classid']) && isset($_POST['userid'])) {
    $userId = $_POST['userid'];
    $classId = $_POST['classid'];
    $db = new LibraryDBConnection();
    $stmt = $db->conn->prepare('SELECT CLASS_MEMBERS_ID FROM CLASS_MEMBERS WHERE MEMBER_CODE = :mc AND CLASS_CODE = :cc');
    $stmt->bindValue(':mc', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':cc', $classId, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $msg = 'You are already enrolled in this class!';
    } else {
        $stmt = $db->conn->prepare('INSERT INTO CLASS_MEMBERS(MEMBER_CODE, CLASS_CODE) VALUES(:ui, :ci)');
        $stmt->bindValue(':ui', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':ci', $classId, PDO::PARAM_INT);
        $stmt->execute();
        $msg = 'Success! You are now enrolled in this class!';
    }
} else {
    $msg = 'Wrong data provided! Try to logout/login and try again!';
}

echo json_encode($msg);
