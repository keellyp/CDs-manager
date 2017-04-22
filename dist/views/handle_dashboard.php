<?php
// FORM HAS BEEN SENT
if (!empty($_POST))
{
    // RETRIEVE DATAS FROM NEW FORM
    $invent_author = trim($_POST['author']);
    $invent_name = trim($_POST['name']);
    $invent_published = $_POST['published'];
    $invent_price = $_POST['price'];
    $invent_type = $_POST['type'];
    $invent_description = trim($_POST['description']);
    $invent_stock = $_POST['stock'];
    $invent_image_name = $_FILES['image']['name'];
    $invent_image_tmp = $_FILES['image']['tmp_name'];

    //  GET FILE FROM INPUT

    $ext = pathinfo($invent_image_name, PATHINFO_EXTENSION);
    $newName = $invent_image_name = $invent_author.'_'.$invent_name.'.'.$ext;
    $target_dir = "../../img/";
    $target_file = $target_dir . $newName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // ADD NEW PRODUCT
    $prepare = $pdo->prepare('INSERT INTO products (author, name, price, type, published, description, stock, image) VALUES (:author, :name, :price, :type, :published, :description, :stock, :image)');

    $prepare->bindValue(':author', $invent_author);
    $prepare->bindValue(':name', $invent_name);
    $prepare->bindValue(':published', $invent_published);
    $prepare->bindValue(':price', $invent_price);
    $prepare->bindValue(':type', $invent_type);
    $prepare->bindValue(':description', $invent_description);
    $prepare->bindValue(':stock', $invent_stock);
    $prepare->bindValue(':image', $invent_image_name);

    // EXECUTE SQL REQUEST
    $exec = $prepare->execute();
}

// DELETE
if (!empty($_GET['delete_id']))
{
    $prepare = $pdo->prepare('DELETE FROM products WHERE id = :id');
    $prepare->bindValue('id', $_GET['delete_id']);
    $prepare->execute();
}

?>
