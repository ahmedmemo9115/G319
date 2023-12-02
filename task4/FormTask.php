<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
   
    <div class="container">
        <h1>Product info </h1>
        <form action="NewResult.php" method="post" class="form-control"  enctype="multipart/form-data">
           
        <div>
                <label>Name:</label>
                <input type="text" name="Pro_name" class="form-control" placeholder="Enter Product Price">
            </div>

            <div>
                <label> Description:</label>
                <textarea name="Pro_desc" rows="3" class="form-control"
                    placeholder="Enter Product Description"></textarea>
            </div>
       
            <div>
                <label> Price</label>
                <input type="number" name="Pro_price" class="form-control" placeholder="Enter Product Price">
            </div>
            <div>
                <label> Discount:</label>
                <input type="number" name="Pro_disc" class="form-control" placeholder="Enter Product discount">
            </div>

            <div>
                <label>Image</label>
                <input type="file" name="Pro_img" class="form-control">
            </div>

            <div class="d-grid gap-2 col-7 mx-auto">
                <button class="btn btn-primary" type="submit"> Submit </button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>