<?php
include('handle_form.php');
$query = $pdo->query('SELECT first_name FROM users');
$name = $query->fetch();
