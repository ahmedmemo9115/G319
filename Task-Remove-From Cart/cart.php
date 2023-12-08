<?php
session_start();

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
                <?php if (isset($_SESSION['cart_success_remove'])) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['cart_success_remove'];
                      unset($_SESSION['cart_success_remove']); ?></div>
                    <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Remove From Cart</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION["cart"] as $products) : ?>

                            <tr>
                                <td><?php echo $products['id']; ?></td>
                                <td><?php echo $products['title']; ?></td>
                                <td><?php echo $products['price']; ?></td>
                                <td><?php echo $products['qty']; ?></td>

                                <td>
                                    <a href="remove-from-cart.php?id=<?php echo $products['id']; ?>" class="btn btn-danger">Remove</a>
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