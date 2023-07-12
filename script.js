// var flag = true;
$(document).ready(function () {
    $('.box2').hide();
    $('#login-btn').click(function () {
        $('.box2').show(1000);;
        $('.box1').hide();
    });
    $('#sign-up-btn').click(function () {
        $('.box2').hide();
        $('.box1').show(1000);
    });
    $('#profile').hide();
    $('#profile').change(function () {
        $('#profile').show();
        $('#upload').hide();
        var nam = document.getElementById("profile");
        if (nam.value.length < 1) {
            $('#profile').hide();
            $('#upload').show();
            alert('selct your image');
        }
    })
    $("#username").keyup(function () {

        var username = $(this).val();
        $.ajax({
            url: 'username.php',
            type: 'post',
            data: { username: username },
            success: function (response) {
                var result = $.parseJSON(response);
                $('#check-username').html(result[0]);
                flag = result[1];
            }
        });
    });
    $('#submit').click(function (e) {
        e.preventDefault();
        var nam = document.getElementById("profile");
        var regex = /^[a-zA-Z]+[a-zA-Z\s]*$/;
        var regexe = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var name = $('#name').val();
        var email = $('#email').val();
        var pass = $('#password').val();
        var cpass = $('#cpassword').val();
        var username = $('#username').val();
        var birthdate = $('#birthdate').val();
        // alert(pass);
        // alert(cpass);
        if (!regex.test(name)) {
            alert('Enter valid name');
            e.preventDefault();
            exit();
        }
        if (!username) {
            alert('Create username');
            e.preventDefault();
            exit();
        }
        if (!regexe.test(email)) {
            alert('Enter valid email');
            e.preventDefault();
            exit();
        }
        if (pass.length == 0) {
            alert('Create password');
            e.preventDefault();
            exit();
        }
        if (pass != cpass) {
            alert('incorrect confirm password check again');
            e.preventDefault();
            exit();
        }
        if (!birthdate) {
            alert('Enter your date of birth');
            e.preventDefault();
            exit();
        }
        if (nam.value.length < 1) {
            alert('selct your image');
            e.preventDefault();
            exit();
        }
        let myform = document.getElementById("sign-up");
        let fd = new FormData(myform);
        $.ajax({
            url: "insert.php",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (response) {
                // var result = $.parseJSON(response);
                // $('#check-username').html(result[0]);
                // flag = result[1];
                alert(response);
                if (response == "sign-up successfull, please login") {
                    $('.box2').show(1000);;
                    $('.box1').hide();
                }
            }
        });
    })

    
})