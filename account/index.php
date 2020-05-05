<?php
    
    include '../php/functions.php';
    include '../header.php';
    if(isset($_SESSION['user_id'])) {
        header('location: ../');
    }
    $err['login'] = '';
    if(isset($_POST['login'])) {
        $result = userlogin($_POST['email'], $_POST['password']);
       if(!$result->success) {
           $err['login'] = "<div class='alert alert-danger'>".$result->message."</div>";
       }
       else {
        $_SESSION['token'] = $result->token;
            $_SESSION['user_id'] = $result->data[0]->user_id;
            header('location: ../');
       }
    }


    if(isset($_POST['signup'])) {
        $result = userregister($_POST['name'], $_POST['email'], $_POST['password']);
        if(!$result->success) {
           $err['login'] = "<div class='alert alert-danger'>".$result->message."</div>";
       }
       else {
        $_SESSION['token'] = $result->token;
            echo "<br> session:----".$_SESSION['user_id'] = $result->data->insertId;
            print_r($result);
       }

    }

?>

<div class="container">
        <div class="row mt-5">
            <div class="col-md-2"></div>

            <div class="col-md-8" id="account">
                <?php
                    if($err['login']!='') {
                        echo $err['login'];
                    }
                ?>
            <!-- login form -->
                <form action='' method="post" id="login" class='border border-primary rounded p-5'>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="" >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" >
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
                <div class="text-center">
                <a href="javascript:void(0)" id="showsignup" class="text-danger">Create new Account? Signup</a>
                </div>
                </form>
            <!-- signup form -->
                    <form action='' method="post" id="signup" class='border border-primary rounded p-5'>
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" name="name" class="form-control" id="" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="" >
                    </div>
                    <div class="form-group">
                        <label for="password">Create Password</label>
                        <input type="password" name="password" class="form-control" id="">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-primary" name="signup">Signup</button>
                    <div class="text-center">
                    <a href="javascript:void(0)" id="showlogin" class="text-danger">Have an account? Login</a>
                    </div>
                    </form>

            </div>
            
            <div class="col-md-2"></div>
        </div>
</div>

</script>
<?php
include '../footer.php'
?>
