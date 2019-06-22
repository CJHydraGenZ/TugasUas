<?php
require_once '../config/config.php';
// require_once 'project/function.php';
require_once '../config/function.php';

$result = query("SELECT * FROM tb_music");
// var_dump($result['visitor']);

$Res = mysqli_query($con, "SELECT * FROM tb_music");
$Num_rows = mysqli_num_rows($Res);
// var_dump($Num_rows);

// $Rsum = mysqli_query($con, "SELECT SUM(visitor) FROM tb_music WHERE id");
$SUM = query("SELECT SUM(visitor) FROM tb_music WHERE id")[0];

// var_dump($SUM['SUM(visitor)']);

// $result = array();
//     while($row = mysqli_fetch_array($res)) {
//         array_push($result, array('id'=>$row[0], 'nim'=>$row[1], 'nama'=>$row[2], 'alamat'=>$row[3],
//         'tgl_lahir'=>$row[4], 'email'=>$row[5], 'hp'=>$row[6], 'photo'=>$row[7]));
//     }

// $filename = '../assets/music/PewDiePie - Congratulations (TIF EDM Remix).mp3';
// $filename1 = '../assets/music/Nightcore - Stay The Night - (Lyrics).mp3';
// // echo $filename . ': ' . filesize($filename) . ' bytes';
// echo filesize($filename) + filesize($filename1) . 'bytye';
$arr = array();
foreach ($result as $getData) {
    $filename = '../assets/music/' . $getData['music'];
    // var_dump($filename);
    $sise = filesize($filename);
    // var_dump($sise);
    // $to = FileSizeConvert($sise);
    // var_dump($to);

    array_push($arr, $sise);
    // echo array_sum($a++);


}

$arrG = array();
foreach ($result as $getGambar) {;
    // var_dump($getGambar['thumbnail']);
    array_push($arrG,  $getGambar['thumbnail']);
}
// var_dump($arrG);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= baseUrl;   ?>  ">Audio Collection</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-item nav-link active" href="<?= baseUrl;   ?>project/index.php  ">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/collection.php  ">Collection</a>
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/upload.php">Upload</a>

            </div>
        </div>
    </nav>


    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active size">
                <img class="Gimg" src="<?= baseUrl;   ?>assets/img/<?= $arrG[0];   ?>   " class="d-block w-100" alt="...">
            </div>

            <?php foreach ($result as $gambar) : ?>
                <div class="carousel-item size">
                    <img class="Gimg" src="<?= baseUrl;   ?>assets/img/<?= $gambar['thumbnail'];   ?>" class="d-block w-100" alt="...">
                </div>


            <?php endforeach ?>




        </div>

    </div>


    <div class="progress">
        <div class="col mt-3 numrows" data-num_rows="<?= $Num_rows;   ?>  "> <canvas id="grapik"></canvas></div>
        <div class="col mt-3 sumV" data-sumvisitor="<?= $SUM['SUM(visitor)'];   ?>  "><canvas id="grapik1"></canvas></div>
        <div class="col mt-3 total" data-totalfile="<?= json_encode($arr, true) ?>"><canvas id="grapik2"></canvas></div>







        <div class="col mt-3"><canvas id="grapik3"></canvas></div>

    </div>
    <div class="lo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex reiciendis unde vitae ullam perspiciatis, voluptatum et sequi amet repudiandae asperiores, nulla inventore quo at suscipit tempora corrupti, corporis vero fugiat.
        Nostrum officia id eos cum. Tempora maiores consequatur, officiis repellendus quaerat aperiam nihil, excepturi, ea adipisci nisi itaque? Qui eligendi commodi vel doloremque animi alias at sequi? Numquam, animi dolorem.
        Nesciunt necessitatibus repellendus modi molestias quisquam recusandae a sequi voluptatem odit nihil deserunt officia veniam unde dolorem quaerat, voluptate porro culpa vero rerum at sunt ipsum impedit sapiente? Veritatis, error.
        Nemo, facilis. Ab, quis earum tenetur exercitationem at quam libero, quaerat fuga aliquid quod voluptates pariatur qui, deleniti iure sed placeat consequatur quo molestiae eligendi architecto. Perspiciatis inventore impedit porro.
        Amet excepturi dolore commodi quam expedita id corrupti enim nemo mollitia, libero, consequuntur adipisci! Soluta adipisci debitis neque. Corporis veniam sit placeat reprehenderit, eaque accusamus unde enim itaque quasi porro.
        Repellat, pariatur quisquam provident non illum minus earum veritatis dolor? Alias sint, rem amet incidunt vitae sit molestiae sed dolor illum molestias odio pariatur commodi magni est veniam tempora ullam.
        Nemo maiores accusantium iste inventore debitis commodi quas officiis ratione qui itaque? Et, molestiae labore cumque mollitia doloribus quis nihil, ad soluta iure quos earum rerum possimus ut minima nulla?
        Sit fugiat totam recusandae dolorem necessitatibus natus fuga numquam! Deleniti ullam, dolorum est, quaerat fuga ex quos maxime adipisci fugiat eaque provident laboriosam consectetur. Natus dolorem assumenda ratione officiis laborum?
        Saepe provident voluptatum vero quaerat dicta. Voluptatem quaerat maiores sint molestiae laboriosam vero saepe quis, est explicabo. Beatae saepe recusandae neque velit earum omnis? Corporis atque quam debitis magnam consequatur?
        Quod reiciendis beatae distinctio excepturi! Aut maiores consequuntur repellat illum! Consequatur odio sequi repudiandae officiis? Necessitatibus voluptatibus, veritatis possimus aperiam tempore saepe quisquam numquam, expedita nesciunt earum soluta pariatur optio.</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>