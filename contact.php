<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=checkinguser", "root", "");
    $db -> query("SET CHARACTER SET utf8");
}
catch(PDOException $e){
    echo $e -> getMessage();
}


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $stmt = $db->prepare("SELECT * FROM users WHERE mail = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && ($pass == $user['parol'])) {
        echo "Xosgeldin ".$email;
    }else{
        echo "Parol ve ya login sehvdir!";
    }
    
}


?>