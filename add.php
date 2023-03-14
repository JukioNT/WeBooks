<?php
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $author = isset($_POST['author']) ? $_POST['author'] : null;
    $pages = isset($_POST['pages']) ? $_POST['pages'] : null;
    $viewed  = isset($_POST['viewed']) ? $_POST['viewed'] : null;

    if (empty($name) || empty($author) || empty($pages) || empty($viewed)){
        echo "Preencha todos os campos";
        exit;
    }

    $PDO = db_connect();
    $sql = "INSERT INTO users(title, author, pages, viewed) VALUES(:title, :author, :pages, :viewed)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':pages', $pages);
    $stmt->bindParam(':viewed', $viewed);

    if($stmt->execute()){
        header('Location: index.php');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>