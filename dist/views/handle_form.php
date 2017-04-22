<?php
// Form has been sent
if (!empty($_POST))
{
    // Get data from form
    $form_pseudo = trim($_POST['pseudo']);
    $form_pass = $_POST['password'];

    // SQL request
    $prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
    $prepare->bindValue('pseudo',$form_pseudo);
    $prepare->execute();
    $user = $prepare->fetch();

    // Find account
    if (gettype($user) === 'object' && $user->password === $form_pass)
    {
        $success_messages = 'All good';
        session_start();
        $_SESSION['pseudo'] = $form_pseudo;
        $_SESSION['password'] = $form_pass;
        $_SESSION['first_name'] = $user->first_name;

        header('Location: dashboard');
        exit();
    }
    else
    {
        $error_messages = 'Identifiant ou mot de passe incorrect !';
    }
}
// No data sent
else
{
    // Default values
    $_POST['pseudo'] = '';
    $_POST['password'] = '';
    $error_messages = '';
}
