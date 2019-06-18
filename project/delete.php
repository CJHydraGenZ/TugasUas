<?php
require_once '../config/config.php';
require_once 'function.php';


$id = $_GET["id"];

$music = $_GET['music'];
$img = $_GET['img'];

if (hapus($id, $music, $img) > 0) {
    echo "
    <script>
        alert('data berasil hapus');
        document.location.href = 'collection.php';
    </script>
";
} else {
    echo "
<script>
      alert('data gagal di hapus');
      document.location.href = 'upload.php'
 </script>
";
};
