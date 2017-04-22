<?php

include 'dist/views/config.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';

if($q == '')
{
    $page = 'login';
}
else if($q == 'login')
{
    $page = 'login';
}
else if($q == 'dashboard')
{
    $page = '_dashboard';
}
else if($q == 'handle_edit')
{
    $page = 'handle_edit';
}
// else if($q == 'cd')
// {
//     $page = '_cd';
// }
else
{
    $page = '404';
}

include 'dist/views/pages/'.$page.'.php';
