<?php

// RETRIEVE DATAS FROM FORM MODIFIED
$product_id = $_POST['id'];
$product_author = trim($_POST['author']);
$product_name = trim($_POST['name']);
$product_published = $_POST['published'];
$product_price = $_POST['price'];
$product_type = $_POST['type'];
$product_description = trim($_POST['description']);
$product_stock = $_POST['stock'];
$product_image_name = $_FILES['image']['name'];
$product_image_tmp = $_FILES['image']['tmp_name'];

// GET FILE FROM INPUT
$ext = pathinfo($product_image_name, PATHINFO_EXTENSION);
$newName = $product_image_name = $product_name.'.'.$ext;
$target_dir = "assets/images/";
$target_file = $target_dir . $newName;
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

// UPDATE WITH NEW DATA
$update = $pdo->prepare("UPDATE products SET author = :author, name = :name, published = :published, price = :price, type = :type, description = :description, stock = :stock, image = :image WHERE id='$product_id'");

$update->bindValue(':author', $product_author);
$update->bindValue(':name', $product_name);
$update->bindValue(':published', $product_published);
$update->bindValue(':price', $product_price);
$update->bindValue(':type', $product_type);
$update->bindValue(':description', $product_description);
$update->bindValue(':stock', $product_stock);
$update->bindValue(':image', $product_image_name);

// EXECUTE SQL REQUEST
$exec = $update->execute();

// REDIRECT TO INVENTORY.PHP WITH THE RIGHT POSITION OF ID
header('Location: dashboard#'.$product_id);
exit();
