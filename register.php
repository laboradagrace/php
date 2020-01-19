
<link href="form.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <form class="form" action="index.php" method="post">
       <?php// include("15_DBHeader.php"); ?>
        <div class ="regForm">
            <h2>Register!</h2>
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Username" name="username">
            </div>
            <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="text" placeholder="Email" name="email">
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Password" name="password">
            </div>
            <button type="submit" name= "submitAccount" class="btn">Register</button>
        </div>
        <p class="text-center"><a href="login.php">Already have an account</a></p>

    </form>
