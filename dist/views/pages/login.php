<?php
    include('dist/views/handle_form.php');
    include('dist/views/partials/header.php');
?>
<div class="container vertical-center">
    <div class="container-login">
        <div class="signup-box">
            <h1>Sign up to your personnal CDs manager</h1>
            <div class="formulaire">
                <form action="#" method="post">
                    <p>
                        <label for="pseudo">pseudo : </label>
                        <input type="text" name="pseudo" id="pseudo">
                    </p>
                    <p>
                        <label for="password">password : </label>
                        <input type="password" name="password" id="password">
                    </p>
                    <?php if(!empty($error_messages)): ?>
                        <div class="error"><p><?= $error_messages ?></p></div>
                    <?php endif; ?>

                    <p class="submit">
                        <input type="submit">
                    </p>
                </form>
            </div>
        </div>
        <div class="signin-box">
            <h2>or sign in right now</h2>
            <div class="formulaire">
                <form action="#" method="post">
                    <p>
                        <label for="sign_firstname">first-name : </label>
                        <input type="text" name="sign_firstname" id="sign_firstname" placeholder="Your first-name">
                    </p>
                    <p>
                        <label for="sign_pseudo">pseudo : </label>
                        <input type="text" name="sign_pseudo" id="sign_pseudo" placeholder="Your pseudo">
                    </p>
                    <p>
                        <label for="sign_password">password : </label>
                        <input type="password" name="sign_password" id="sign_password" placeholder="Your password">
                    </p>
                    <p class="submit">
                        <input type="submit">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include('dist/views/partials/footer.php');
 ?>
