<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Logo upload</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/bb539bd9a1.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid fond-grey pt-4">
        <div class="d-flex justify-content-around">
            <div>
                <div class="alert alert-success mb-4" role="alert">
                    <?$msg = "Your file was successfully uploaded!";
                    echo $msg;?>
                </div>
                <ul>
                    <?php foreach ($upload_data as $item => $value):?>
                    <li><?php echo $item;?>: <?php echo $value;?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
        </div>
        <div class="pb-4">
            <a class="btn btn-info mr-2" href="<? echo base_url('upload')?>">Charger un autre fichier</a>
            <a class="btn btn-info" href="<? echo base_url("customs/index")?>">Retour</a>
        </div>
</body>
</html>