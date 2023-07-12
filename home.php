<?php
include 'database.php';
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script type='text/javascript'>alert('login first');
    window.location='/new/';</script>";
} else {
  $uname = $_SESSION["username"];
  $sql = mysqli_query($con, "SELECT * FROM information where username ='$uname' ");
  $row = mysqli_fetch_assoc($sql);
}
  ?>

  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
      <?php include 'style2.css';
      ?>
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          </ul>
        </div>


        <ul class="nav">
          <li class="nav-item me-3">
            <a class="nav-link" href="logout.php">logout</a>
          </li>
          <div class="dropdown ">
            <button class="btn btn-secondary dropdown-toggle " type="button" aria-haspopup="true" data-bs-toggle="dropdown"aria-expanded="false" fdprocessedid="j588t">
              More info
            </button>
            <ul class="dropdown-menu dropdown-menu-dark " style="">
              <li><a class="dropdown-item" id="delete">delet account</a></li>
              <li><a class="dropdown-item" id="me">about me</a></li>
              <li><a class="dropdown-item" id="csv" href = "csv.php">download csv</a></li>
              <li><a class="dropdown-item" id="insertcsv" href = "insertcsv.php">insert csv</a></li>
              <li><a class="dropdown-item" id="pdf" href = "pdf/pdf.php">Genrate pdf</a></li>
            </ul>
          </div>
          <li class="nav-item">
          <img class="img" src="<?php echo $row['profile'] ?>" />
          </li>
        </ul>
      </div>
    </nav>
    <div class="box1">
      <form action="home.php" method="post" enctype="multipart/form-data"><br>
       

      <h1 class="text-center"><b>Welcome </b>
        <?php echo $row["name"] ?>
      </h1><br>
      <?php
      if ($row["name"] == "tamraj kilvish") {
        ?>
        <h2 class="text-center">Andhra kayam rhe sarkar</h2><br>
        <?php
      }
      ?>
      <img src="<?php echo $row['profile'] ?>" />
      <p class="text-center">
        <?php echo $row["email"] ?>
      </p>
    </form>
  </div>

  <div class="box2 ">
    <div class="text-center _table">
      <form action="" class="edit-form" id="update">
        <table>
          <tr>
            <td>id-> </td>
            <td> <input type="text" class="input" id="id" name="id" value="<?php echo $row['id'] ?>" disabled>
            </td>
            <td><button class="btn btn-primary edit" id="edit-id">edit</button></td>
          </tr>
          <tr>
            <td>name-> </td>
            <td> <input type="text" class="input" id="name" name="name" value="<?php echo $row['name'] ?>" disabled>
            </td>
            <td><button class="btn btn-primary edit" id="edit-name">edit</button></td>
          </tr>
          <tr>
            <td>username-> </td>
            <td> <input type="text" id="username" class="input" name="username" value="<?php echo $row['username'] ?>"
                disabled> </td>
            <td><button class="btn btn-primary edit" id="edit-username">edit</button></td>
          </tr>
          <tr>
            <td colspan="3" class="text-center">
              <div id="check-username"></div>
            </td>
          </tr>
          <tr>
            <td>password-> </td>
            <td> <input type="password" id="password" class="input" name="password"
                value="<?php echo $row['password'] ?>" disabled> </td>
            <td><button class="btn btn-primary edit" id="edit-password">edit</button></td>
          </tr>
          <tr>
            <td>email-> </td>
            <td> <input type="email" id="email" name="email" class="input" value="<?php echo $row['email'] ?>" disabled>
            </td>
            <td><button class="btn btn-primary edit" id="edit-email">edit</button></td>
          </tr>
          <tr>
            <td>date of birth-> </td>
            <td> <input type="date" id="birthdate" class="input" name="birthdate"
                value="<?php echo $row['birthdate'] ?>" disabled> </td>
            <td><button class="btn btn-primary edit" id="edit-birthdate">edit</button></td>
          </tr>
          <tr>
            <td colspan="3"><button class="btn btn-success confirm">confirm</button></td>
          </tr>
        </table>
      </form>
    </div>
  </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"
  integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA=="></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $('.box2').hide(); 
    $('.img').hide(); 
    $('#delete').click(function () {
      // e.preventDefault();
      const del = confirm("do you realy want to delete your account");
      if (del) {
        var id = <?php echo $row['id'] ?>

        $.ajax({
          url: 'delete.php',
          type: 'post',
          data: { id: id },
          success: function (response) {
            alert(response);
            if (response == "Account deleted")
              window.location = 'logout.php';
          }
        })
      }
    })
    $('#me').click(function () {
      $('.box1').hide();
      $('.box2').show();
      $('.img').show();
      $('.dropdown').css("margin-right","20px");
    });


    $('#edit-id').click(function (e) {
      e.preventDefault();
      alert("you can not edit your id");
    })
    $('#edit-name').click(function (e) {
      e.preventDefault();
      $('#name').removeAttr("disabled");
      $('#name').focus();
    })
    $('#edit-username').click(function (e) {
      e.preventDefault();
      $('#username').removeAttr("disabled");
      $('#username').focus();
    })
    $('#edit-password').click(function (e) {
      e.preventDefault();
      var pass = prompt("Enter your current password");
      if (pass == "<?php echo $row['password'] ?>") {
        $('#password').removeAttr("disabled");
        $('#password').attr("type", "text");
        $('#password').focus();
      }
      else {
        alert("incorrect password ");
      }
    })
    $('#edit-email').click(function (e) {
      e.preventDefault();
      $('#email').removeAttr("disabled");
      $('#email').focus();
    })
    $('#edit-birthdate').click(function (e) {
      e.preventDefault();
      $('#birthdate').removeAttr("disabled");
      $('#birthdate').focus();
    })
    var uname = true;
    $("#username").keyup(function () {
      var username = $(this).val();
      $.ajax({
        url: 'username.php',
        type: 'post',
        data: {username: username },
        success: function (response) {
          var result = $.parseJSON(response);
          if (result[0] == "<span style='color: black;'>Available.</span>") {
            $('#check-username').html("<span style='color: green;'>Available.</span>");
            uname = true;
          }
          else if (username.toLowerCase() == "<?php echo $_SESSION['username'] ?>".toLowerCase()) {
            uname = true;
          }
          else {
            $('#check-username').html(result[0]);
            uname = false;
          }
        }
      });
    });
    $('.confirm').click(function (e) {
      e.preventDefault();
      var regex = /^[a-zA-Z]+[a-zA-Z\s]*$/;
      var regexe = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      var name = $('#name').val();
      var email = $('#email').val();
      var pass = $('#password').val();
      var username = $('#username').val();
      var birthdate = $('#birthdate').val();
      if (!regex.test(name)) {
        alert('Enter valid name');
        exit();
      }
      if (!username) {
        alert('Create username');
        exit();
      }
      if (!regexe.test(email)) {
        alert('Enter valid email');
        exit();
      }
      if (pass.length == 0) {
        alert('Create password');
        exit();
      }
      if (!birthdate) {
        alert('Enter your date of birth');
        exit();
      }
      if (!uname) {
        alert("Enter valid username");
        exit();
      }
      var con = confirm("are you sure to update this data");
      if (con) {
        var myform = document.getElementById("update");
        var fd = new FormData(myform);
        $.ajax({
          url: "update.php",
          data: fd,
          type: 'POST',
          success: function (response) {
            alert(response);
            if(response == "data updated successfully")
            {
              location.reload();
            }
          }        
        });
      }
    })
  })
</script>