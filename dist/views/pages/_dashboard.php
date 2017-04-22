<?php
    session_start();
    if(!isset($_SESSION['pseudo']))
    {
        header("Location: login");
    }
    else
    {
        include('dist/views/handle_dashboard.php');

        $query = $pdo->query('SELECT * FROM products');
        $products = $query->fetchAll();

        include('dist/views/partials/header.php');
?>
<div class="container column">
    <?php include('dist/views/partials/sidebar.php') ?>
    <div class="container-dashboard">
        <div class="dashboard-intro">
            <h1>Hello <?php echo $_SESSION['first_name']; ?> ! </h1>
            <h2>Welcome to your collection.</h2>
            <div class="border"></div>
        </div>
        <div class="dashboard-products">
            <?php foreach ($products as $key => $_product):?>
            <div class="product" id="<?php echo $_product->id ?>">
                <div class="product-image">
                    <img src="dist/img/<?php echo $_product->image ?>" alt="sleeve">
                </div>
                <div class="product-info">
                    <form class="container-edit" action="handle_edit" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $_product->id ?>">
                        <div>
                            <label for="author">Author : </label>
                            <input type="text" name="author" id="author" value="<?php echo $_product->author ?>" >
                        </div>
                        <div>
                            <label for="name">Title : </label>
                            <input type="text" name="name" id="name" value="<?php echo $_product->name ?>"  >
                        </div>
                        <div>
                            <label for="description">Description : </label>
                            <textarea type="text" name="description" id="description"  ><?php echo $_product->description ?></textarea>
                        </div>
                        <div>
                            <label for="published">Released : </label>
                            <input type="date" name="published" id="published" value="<?php echo $_product->published ?>"   >
                        </div>
                        <div>
                            <label for="price">Price : </label>
                            <input type="number" name="price" id="price" value="<?php echo $_product->price ?>"  >
                        </div>
                        <div>
                            <label for="type">Format : </label>
                            <select id="type" name="type">
                                <option value="cd" <?php if ($_product->type === 'cd') { ?>selected<?php } ?>>CD</option>
                                <option value="vinyl" <?php if ($_product->type === 'vinyl') { ?>selected<?php } ?>>Vinyl</option>
                            </select>
                        </div>

                        <div>
                            <input type="file" name="image" value="<?php echo $_product->image ?>">
                        </div>
                        <div class="button-info">
                            <input type="submit" name="edit" id="edit" value="Edit">
                            <a href="?delete_id=<?php echo $_product->id ?>">Delete</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
        </div>
        <div class="dashboard-form">
            <div class="form-exit"><i class="fa fa-times" aria-hidden="true"></i></div>
            <form class="container-edit" action="#" method="post" enctype="multipart/form-data">
                <div>
                    <label for="author">Author : </label>
                    <input type="text" name="author" id="author">
                </div>
                <div>
                    <label for="name">Title : </label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="published">Released : </label>
                    <input type="date" name="published" id="published" >
                </div>
                <div>
                    <label for="price">Price : </label>
                    <input type="number" name="price" id="price">
                </div>
                <div>
                    <label for="type">Format : </label>
                    <select id="type" name="type">
                        <option value="vinyl" name="cd" selected>Vinyl</option>
                        <option value="cd" name="vinyl">CD</option>
                    </select>
                </div>
                <div>
                    <label for="description">Description : </label>
                    <input type="text" name="description" id="description">
                </div>
                <div>
                    <input type="file" name="image">
                </div>
                <div>
                    <input type="submit" name="submit" id="submit">
                </div>
            </form>
        </div>
        <div class="button-add-product">
            <p>Ajouter un produit</p>
        </div>
        <div class="resume">
            <h2>Your resume</h2>
            <div class="resume-general">
                <p>You have 4 discs in total.</p>
                <p>Your collection of records cost 240€.</p>
                <p>Latest modification : 01/01/2017.</p>
            </div>
        </div>
    </div>
</div>
<?php
    include('dist/views/partials/footer.php');
}
 ?>
