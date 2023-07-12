<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>login_sign-up</title>
        <!-- <link rel="stylesheet" href="style.css" type = "text/css"> -->
        <style>
            <?php
            include 'style.css';
            ?>
        </style>
</head>

<body>
    <div class="container">
        <div class="box1">
            <div class="top">
                <header>
                    <h1 class="text-center">sign-up</h1>
                </header>
            </div>
            <form action="insert.php" method="post" enctype="multipart/form-data" id="sign-up">
                <div class="in" id="1">
                    <input type="text" id="name" name="name" placeholder="Enter your name" class = "style" required>
                </div>

                <div class="in" id="2">
                    <!-- <i class='bx bx-user' ></i> -->
                    <input type="text" id="username" name="username" placeholder="Create username" class = "style" required>
                    <div id="check-username"></div>
                </div>

                <div class="in" id="2">
                    <input type="email" id="email" name="email" placeholder="Enter your email" class = "style" required>
                </div>

                <div class="in" id="3">
                    <!-- <i class='bx bx-lock-alt'></i> -->
                    <input type="password" id="password" name="password" placeholder="Create password" class = "style" required>
                </div>

                <div class="in" id="4">
                    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm password" class = "style" required>
                </div>

                <div class="in" id="5">
                    <input type="text" id="birthdate" name="birthdate" placeholder="Enter your date of birth MM/DD/YYYY" onfocus="(this.type='date')" class = "style" required>
                </div>
                <div class="in" id="6">
                    <label for="profile" class="upload style">
                        <input type="file" id="profile" name="profile">
                        <p id="upload">Upload your profile photo</p>
                    </label>
                </div>

                <div class="in" id="7">
                    <input type="reset" id="reset" class="style2"></input>
                    <input type="submit" id="submit" name="save" class = "style2"></input>
                </div>
                <button type="button" id="login-btn" name="Login-btn" class="btn btn-primary style2">Sign-in</button>
            </form>
        </div>
        <div class="box2" >
            <form action="login.php" id="login" method = "post">
                <div id="1">
                    <input type="text" id="lusername" class="login-style" name="lusername" placeholder="Enter your username"required>
                </div>
                <div  id="2">
                    <input type="password" class="login-style" id="lpassword" name="lpassword" placeholder="Enter your password" required>
                </div>
                
                <div class="in" id="6">
                    <input type="submit" id="lsub" name="lsave" value = "Login" class="btn btn-primary login-style2"></input>
                </div>
                <button type="button" id="sign-up-btn" name="sign-up-btn" class="btn btn-primary login-style2">create an account</button>

            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="crossorigin="anonymous"></script>
<script type = text/javascript src="script.js"></script>
