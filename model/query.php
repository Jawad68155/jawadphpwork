<?php
include("dashmin/php/query.php")
?>
<?php

if(isset($_POST['registration'])) {
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $upassword = $_POST['upassword'];
    $passwordHash = sha1( $upassword);
    $unumber = $_POST['unumber'];

    // Check email
    $checkEmail = $pdo->prepare("SELECT * FROM users WHERE userEmail = :pemail");
    $checkEmail->bindParam(':pemail', $uemail);
    $checkEmail->execute();
    $chk = $checkEmail->fetch(PDO::FETCH_ASSOC);

    if($chk['userEmail']) {
        echo "<script>
            alert('Already Exist');
        </script>";
    } else {
        $query = $pdo->prepare("INSERT INTO users(userName, userEmail, userPassword, userNumber) VALUES(:pn, :pe, :pp, :pnum)");
    $query->bindParam(':pn', $uname);
    $query->bindParam(':pe', $uemail);
    $query->bindParam(':pp', $passwordHash);
    $query->bindParam(':pnum', $unumber);
    $query->execute();

    echo "<script>
        alert('Account registered successfully!');
        location.assign('signin.php');
    </script>";

    }
}
?>