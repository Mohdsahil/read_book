<?php
    
    include 'functions.php';
     $result = submit_read_history($_GET['book_id'], $_GET['time_count'], $_GET['rating'], $_GET['review']);
     print_r($result)
?>