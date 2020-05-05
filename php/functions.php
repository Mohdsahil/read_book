<?php
  session_start();
    
function userlogin($email, $password) {
    
     $url = 'http://localhost:7000/api/users/login';
     $data = [
            'email' => $email,
            'password' => $password
            ]; 
     $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
    ]);

    $response = curl_exec($curl);
    $data = json_decode($response);
    return $data;

}

function userregister($name, $email, $password) {
    $url = 'http://localhost:7000/api/users/register';
    $data = [
        'name'       => $name,
        'email'      => $email,
        'password'   => $password   
    ];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
    ]);
    $response = curl_exec($curl);
    $result = json_decode($response);
    return $result;


}

function fetch_books() {
    if(isset($_SESSION['token'])) {
         $url = 'http://localhost:7000/api/users/';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'x-access-token: '.$_SESSION['token'],
    'Content-Type: application/json'
]);
        $response = curl_exec($curl);
        curl_close($curl);

         return $response;
    } else {
        $data = [
            "success" => "0",
            "data" => "login or signup first"
        ];
        return json_encode($data);
    }  
 
}


function submit_read_history($book_id, $time_count, $rating, $review) {

    $url = 'http://localhost:7000/api/users/readed';
    $data = [
        'book_id'      => $book_id,
        'user_id'      => $_SESSION['user_id'],
        'time_count'   => $time_count,   
        'rating'       => $rating,
        'review'       => $review
    ];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'x-access-token: '.$_SESSION['token'],
        'Content-Type: application/json'
    ]);
    $response = curl_exec($curl);
    $result = json_decode($response);
    return $result;

}

?>