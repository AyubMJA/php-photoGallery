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
    <!-- Page title -->

    <div class="container">
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">
            <a href="app.ctrl.php" style="text-decoration: none">Thumbnail Gallery </a>
            <br>
        </h1>
        <hr class="mt-2 mb-5">
        <h4 style="text-align:center">
            <?php if($TPL['tpl']["allphotos"] == 0 || 2){
        echo $TPL['photoData'][$TPL['tpl']["id"]]["description"]; }?>
        </h4>

        <div class="row">
            <?php if ($TPL['tpl']["allphotos"] == 1 ){ foreach ($TPL['photoData'] as $key1 => $value1)
                {
                    $src = "photos/" .$value1["directory"]."/thumbs/".$value1["photos"][count($value1["photos"]) - 1] ;
            ?>
            <div class="col-lg-4 col-sm-6">
                <a href="app.ctrl.php?act=more&id=<?=$key1?>" class="d-block mb-4 h-100">
                    <div class="thumbnail">
                        <img src="<?=$src?>" class="img-fluid img-thumbnail">
                        <div class="caption" style="text-align:center; text-decoration:none">
                            <?php echo $value1["description"]; ?>
                        </div>
                    </div>
                </a>
            </div>

            <?php  }}?>

            <?php if($TPL['tpl']["allphotos"] == 0){
                foreach($TPL['photoData'][$TPL['tpl']["id"]]["photos"] as $key => $row){
                $src = "photos/" .$TPL['photoData'][$TPL['tpl']["id"]]["directory"]."/thumbs/".$row ;
                ?>
                <div class="col-lg-2 col-sm-6">
                <figure class="figure">
                    <a href="app.ctrl.php?act=enlarge&id=<?=$TPL['tpl']['id']?>&enlargeid=<?=$key?>" class="d-block mb-4 h-100">
                        <img src="<?=$src?>" class="img-fluid img-thumbnail">
                    </a>
                    <figcaption class="figure-caption"><br></figcaption>
                </figure>
            </div>
            <?php }
        }?>

            <?php if($TPL['tpl']["allphotos"] == 2){
                $src = "photos/".$TPL['photoData'][$TPL['tpl']["id"]]["directory"]."/".$TPL['photoData'][$TPL['tpl']["id"]]["photos"][$TPL['tpl']["enlargeid"]];?>
                <div class="large-12 columns">
                <div class="thumbnail">
                    <ul class="pager">
                        <?php if($TPL['tpl']['enlargeid']-1 >=0){?>
                        <li>
                            <a href="app.ctrl.php?act=enlarge&id=<?=$TPL['tpl']['id']?>&enlargeid=<?=$TPL['tpl']['enlargeid']-1?>"
                                class="d-block mb-4 h-100">Previous
                            </a></li>
                            
                        <?php } ?>

                        <?php if($TPL['tpl']['enlargeid']+1 <count($TPL['photoData'][$TPL['tpl']["id"]]["photos"])){?>
                        <li><a href="app.ctrl.php?act=enlarge&id=<?=$TPL['tpl']['id']?>&enlargeid=<?=$TPL['tpl']['enlargeid']+1?>"
                                class="d-block mb-4 h-100">Next
                            </a></li>

                            <span>&nbsp;&nbsp;&nbsp;</span>
                        <?php } ?>

                        <li><strong><span>&nbsp;&nbsp;&nbsp;</span>
                                (<?php echo $TPL['tpl']['enlargeid'] + 1 ."/" .count($TPL['photoData'][$TPL['tpl']["id"]]["photos"]); ?>
                                )<span>&nbsp;&nbsp;&nbsp;</span></strong></li>
                        <li><a href="app.ctrl.php?act=more&id=<?=$TPL['tpl']['id']?>" class="d-block mb-4 h-100">Show
                                All Photos
                            </a></li>
                    </ul>
                    <img src="<?=$src?>" class="img-fluid img-thumbnail">
                </div>
            </div>
            <?php }
                    ?>

        </div>
    </div>
</body>

</html>