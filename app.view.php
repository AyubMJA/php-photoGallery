<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab 2</title>
</head>

<body>
    <header>
        <div class="container">
            <h1 class="font-weight-light">
                <a href="app.ctrl.php" style="text-decoration:none">My Photo Galleries</a>
            </h1>
        </div>
    </header>
    <div class="jumbotron jumbotron-fluid">
        <div class="row">
            <?php
                if($TPL['tpl']['allphotos'] == 1){
                    foreach($TPL['photoData'] as $key1 => $value1)
                   {
                       $src = "photos/".$value1["directory"]."/thumbs/".$value1["photos"][count($value1["photos"]) - 1];
                       ?>
                       <div class="col-lg-4 col-sm-6">
                           <a href="app.ctrl.php?act=more&id=<?=$key1?>" class="d-block mb-4 h-100">
                           <div class="thumbnail">
                               <img src="<?=$src?>" class="img-fluid img-thumbnail" >
                           </div>
                           </a>
                       </div>
                       <?php
                   } 
                }
            ?>
        </div>
    </div>
</body>

</html>