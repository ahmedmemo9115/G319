<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <table class="table table-hover">
        <thead class="table-light">
            <tr class="table-primary" style="text-align: center">
                <th colspan="5" class="table-dark">
                    <h3>Product informations</h3>
                </th>
            </tr>
            <tr class="table-primary">
                <th>Produt name </th>
                <th>Produt description </th>
                <th>Produt Price </th>
                <th>Produt Discount </th>
                <th>Produt Image </th>
            </tr>

        </thead>
        <tbody>
            <tr class="table-light">
                <th>
                    <?php echo $ProName = $_POST["Pro_name"]; ?>
                </th>
                <th>
                    <?php echo $ProDesc = $_POST["Pro_desc"]; ?>
                </th>
                <th>
                    <?php echo $ProPrice = $_POST["Pro_price"]; ?>
                </th>
                <th>
                    <?php echo $Prodisc = $_POST["Pro_disc"];
                    ?>
                </th>
                <th>
                    <?php

                    $error = '';
                    $success = '';

                    if ($_SERVER['REQUEST_METHOD'] == "POST") {

                        $img_file = $_FILES['Pro_img'];

                        $i_name = $img_file['name'];
                        $i_error = $img_file['error'];
                        $i_size = $img_file['size'];
                        $i_type = $img_file['type'];
                        $i_tmp_name = $img_file['tmp_name'];

                        if ($i_name != '') {
                            $exten = pathinfo($i_name);

                            $file_name = $exten['filename'];
                            $file_exten = $exten['extension'];

                            $allowed = array("jpg", "png", "pdf");

                            if (in_array($file_exten, $allowed)) {

                                if ($i_error === 0) {

                                    if ($i_size < 500000) {

                                        $new_name = uniqid('', true) . "." . $file_exten;
                                        $destination = "Uploads/" . $new_name;

                                        move_uploaded_file($i_tmp_name, $destination);
                                        $success = "Your File Have Been Uploaded Successfully";
                                    } else {
                                        $error = "file is too big";

                                    }

                                } else {

                                    $error = "you have an error";
                                }
                            } else {


                                $error = "please upload good extension";

                            }

                        } else {

                            $error = "Please Upload image";
                        }

                    }



                    ?>


                    <?php if ($error != '') { ?>
                        <h4  class="alert alert-danger col text-center">
                            <?php echo $error; ?>
                        </h4>
                    <?php } ?>
                    <?php if ($success != '') { ?>
                        <h4 class="alert alert-success col text-center">
                            <?php echo $success; ?>
                        </h4>
                    <?php } ?>


                </th>
            </tr>

        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>