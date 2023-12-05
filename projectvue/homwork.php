<?php include('index.html') ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();

    function randomArray($size)
    {
        $randomArr = [];
        for ($i = 0; $i < $size; $i++) {
            $randomArr[] = rand(1, 100);
        }
        return $randomArr;
    }

    if (!isset($_SESSION['arrays'])) {
        $_SESSION['arrays'] = [];
        for ($i = 0; $i < 100; $i++) {
            $_SESSION['arrays'][] = randomArray(10);
        }
    }

    if (isset($_POST['sortAsc'])) {
        sort($_SESSION['arrays'][0]);
    } elseif (isset($_POST['sortDesc'])) {
        rsort($_SESSION['arrays'][0]);
    } elseif (isset($_POST['renew'])) {
        $_SESSION['arrays'][0] = randomArray(10);
    }
    ?>


    <div class="" style="margin-left:30px ">
        <?php
        echo"<pre>";
        print_r($_SESSION['arrays'][0]);
       
        ?>
       

    </div>
    <div class="button" style="margin-left:30px;margin-top: -50px" >
            <form method="post" action="">
                <button class="btn btn-primary" type="submit" name="sortAsc">Ascending</button>
                <button class="btn btn-primary" type="submit" name="sortDesc">Descending</button>
                <button class="btn btn-primary" type="submit" name="renew">Renew Array</button>
            </form>
    </div>



</body>

</html>