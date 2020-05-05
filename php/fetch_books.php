<?php
   
    include './functions.php';

    $result = fetch_books();
    $data = json_decode($result);

    
    if($data->success==1)  {
      $dat = $data->data;
    $output = '<div class="row">';
    foreach($dat as $row) {
        $output .='<div class="col-md-6 mt-5">';
        $output .='<div class="card" style="">';
        $output .='<img src="'.$row->book_thumbnail.'"  class="card-img-top" alt="...">';
        $output .= '<div class="card-body">';
        $output .= '<h5 class="card-title">'.$row->book_name.'</h5>';
        $output .= '<p class="card-text">'.$row->book_discription.'</p>';
        $output .= '<a href="#" data-bookid="'.$row->book_id.'" data-bookname="'.$row->book_name.'"  data-booklink="'.$row->book_link.'"  class="btn btn-primary start_reading">Read Book</a>';
        $output .= ' </div></div></div> ';
    }
    
    $output .='</div>';
   echo $output;

   }else {
       echo "login first";
   }
  
?>

