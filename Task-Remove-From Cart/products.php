<?php
session_start();
if (!file_exists("products.json")) {
    $data = file_get_contents("https://dummyjson.com/products");
    file_put_contents("products.json", $data);
}
$data = file_get_contents("products.json");
$data = json_decode($data, true);

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// session_destroy();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Hello, world!</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['cart_empty']) ) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['cart_empty'] ;
                    unset($_SESSION['cart_empty']);
                    ?></div>
                    <?php endif; ?>
                <?php if (isset($_SESSION['cart_success'])) : ?>
                    <div class="alert alert-success"><?= $_SESSION['cart_success'];
                    unset($_SESSION['cart_success']);
                     ?></div>
                <?php endif; ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Images</th>
                            <th>Add To Cart</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data["products"] as $product) : ?>

                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['title']; ?></td>
                                <td><?php echo $product['price']; ?></td>
                                <td><?php echo $product['description']; ?></td>
                                <td>
                                    <?php

                                    // if (is_array($product['images'])) {
                                    //     foreach ($product['images'] as $image) {
                                    // 
                                    ?>

                                    <!-- // <img src="<?php echo $image; ?>" width="100" height="100" class="mb-3" alt=""> -->
                                    <?php
                                    //     }
                                    // }
                                    ?>
                                </td>
                                <td>
                                    <a href="add-to-cart.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Add</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>