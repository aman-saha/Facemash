
<!DOCTYPE html>
<html>
<head>
    <title>facemash</title>
<style>
    #i1{
        padding-top: 25px;
        padding-right: 50px;
        padding-bottom: 25px;
        padding-left: 200px;
    }
    #i2{
        padding-top: 25px;
        padding-right: 200px;
        padding-bottom: 25px;
        padding-left: 50px;
    }
    .heading{
        background-color: maroon;
        color: white;
    }
    .main{
        font-weight: 50;
        text-align: center;
    }
    #or{
        padding: 50px;
        text-align: center;
    }
    #no{
        padding: 50px;
        text-align: center;
    }
    .logoHeader{
        height: 0px;
        vertical-align: center;
        text-align: center;
        padding-left: 20px;
        padding-right:20; 
    }
</style>
    <form action="facemash.php" method="POST">
        <div class="jumbotron">
        <div class="heading">
            <h1 style="text-align:center; padding:10px">MASHED
            </h1>
        </div>
        <div class="main">
            <p style="font-size:30;">
                <b>
                    <center>  
                    </center>
                </b>
            </p>
                        <h2>Who's Hotter? Click to Choose.</h2>
        </div>
        <div class="content">
            <style type="text/css">
                body { font: 14px/1.3 verdana, arial, helvetica, sans-serif; }
                h1 { font-size:1.3em; }
                h2 { font-size:1.2em; }
                a:link { color:#33c; } 
                a:visited { color:#339; }
                p { max-width: 60em; }

                /* so linked image won't have border */
                a img { border:none; }
            </style>
</head>

<body>
    <?php 
    $root = '';
    $path = 'images/';
    function getImagesFromDir($path) {
        $images = array();
        if ( $img_dir = @opendir($path) ) {
            while ( false !== ($img_file = readdir($img_dir)) ) {
                // checks for gif, jpg, png
                if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
                    $images[] = $img_file;
                }
            }
            closedir($img_dir);
        }
        return $images;
    }

    function getRandomFromArray($ar) 
    {
        mt_srand( (double)microtime() * 941 ); 
        $num = array_rand($ar);
        return $ar[$num];
    }
    function getRandomFromArray2($ar) 
        {
            mt_srand( (double)microtime() * 954 ); 
            $num = array_rand($ar);
            return $ar[$num];
        }
    $imgList = getImagesFromDir($root . $path);
    $img1 = getRandomFromArray($imgList);
    $img2 = getRandomFromArray2($imgList);
    
    if($img1==$img2)
    {
        $img2=getRandomFromArray2($imgList);
    }

    /*$r1=explode('(',$img1);    
    $r2=explode('(',$img2);
    //$k1=explode(')',$r1[1]);
    //$k2=explode(')',$r2[1]);
    $rank1=(int)($k1[0]);
    $rank2=(int)($k2[0]);*/
    $new_location="facemash.php";
?>
    <div><input type="image" src="<?php echo $path . $img1;?>" alt="" id="i1" name="image1" height="300px" width="300px" style="float:left"></div>
        <style>
            p {text-align:center;}
        </style>
            <p><strong>OR</strong></p>
    <div><input type="image" src="<?php echo $path . $img2;?>" alt="" id="i2" name="image2" height="300px" width="300px" style="float:right"></div>
    <a href="facemash.php" id="no">NO ONE ?</a>
    <?php //echo "$rank1";?>
</body>
    </form>
</html>