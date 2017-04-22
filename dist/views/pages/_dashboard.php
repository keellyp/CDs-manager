<?php
    include('dist/views/handle_dashboard.php');
    session_start();
    if(!isset($_SESSION['pseudo']))
    {
        header("Location: ../../../index.php");
    }
    else
    {
        include('dist/views/partials/header.php');
?>
<div class="dashboard">
    <?php include('dist/views/partials/sidebar.php') ?>
    <section>
        <div class="container-dashboard">
            <h1>Bonjour <?php echo $_SESSION['first_name']; ?> !</h1>
            <div class="button-add">
                <div class="add">
                    <a href="_disques.php">
                        <p>La liste de vos vinyles</p>
                    </a>
                </div>
                <div class="add">
                    <a href="_cd.php">
                        <p>La liste de vos CD</p>
                    </a>
                </div>
                <div class="add">
                    <a href="_total.php">
                        <p>La liste de votre inventaire</p>
                    </a>
                </div>
            </div>
            <div class="resume">
                <h2>Mon résumé général</h2>
                <div class="resume-general">
                    <p><a href="../export.php" class="resume-link">Exporter mon inventaire</a></p>
                    <p>Prochaine livraison le : 07/08/2017</p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
    include('dist/views/partials/footer.php');
}
 ?>
