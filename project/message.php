<?php

require_once '../config/config.php';
require_once '../config/function.php';

session_start();

if (isset($_POST["submit"])) {
    // cek apakah data berasil di tambahkan / tidak
    if (kirimP($_POST) > 0) {
        $_SESSION['pesan'] = 'berasil Kirim';
        echo "
                    <script>
                    
                        document.location.href = '../index.php';
                    </script>
                ";
    } else {
        $_SESSION['pesan'] = 'gagal di Kirim';
        echo "
        
                <script>
                      
                      document.location.href = '../index.php';
                 </script>
                ";
    }
}
