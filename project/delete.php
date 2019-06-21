<?php
require_once '../config/config.php';
require_once 'function.php';

session_start();

$id = $_GET["id"];
$music = $_GET['music'];
$img = $_GET['img'];

if (hapus($id, $music, $img) > 0) {
    $_SESSION['pesan'] = 'berasil di hapus';
    echo "
    <script>
       
        document.location.href = 'collection.php';
    </script>

    
";
} else {
    $_SESSION['pesan'] = 'gagal di hapus';
    echo "
<script>
   
      document.location.href = 'upload.php';
 </script>
";
};
