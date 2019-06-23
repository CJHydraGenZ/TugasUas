<?php

require_once '../config/config.php';
require_once '../config/function.php';



// var_dump($_POST);
// die;

if (isset($_POST)) {
    // cek apakah data berasil di tambahkan / tidak

    if (kirimP($_POST) > 0) {

        echo "
                    <script>
                       
                        document.location.href = '../index.php';
                    </script>
                ";
    } else {

        echo "
        
                <script>
                      
                      document.location.href = '../index.php';
                 </script>
                ";
    }
}
