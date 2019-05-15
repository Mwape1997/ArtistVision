
<?php

/*
Deprecated
Authors: Mwape
*/

$connect = new PDO("mysql:host=localhost;dbname=artists_vision", "root", "");
$message = '';
if(isset($_POST["email"]))
{
    // All this is for the register of Artist - php wise
    sleep(5);
    $query = "
 INSERT INTO artistlist_test 
 (artist_email, password, firstname, lastname, alias, skills, education, city, state, country, costperhour)
 VALUES 
 (:artist_email, :password, :firstname, :lastname, :alias, :skills, :education, :city, :state, :country, :costperhour)
 ";
    // For the moment no password encryption - not worth the troube when forgetting passwords
    $password_hash = $_POST["password"];
    //$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $costperhour = "40";
    $user_data = array(
        ':artist_email'   => $_POST["email"],
        ':password'   => $password_hash,
        ':firstname'  => $_POST["firstname"],
        ':lastname'  => $_POST["lastname"],
        ':alias'  => $_POST["alias"],
        ':skills'  => $_POST["skills"],
        ':education'  => $_POST["education"],
        ':city'  => $_POST["city"],
        ':state'  => $_POST["state"],
        ':country'  => $_POST["country"],
        ':costperhour'  => $costperhour
    );
    $statement = $connect->prepare($query);
    if($statement->execute($user_data))
    {
        $message = '
  <div class="alert alert-success">
  Registration Completed Successfully
  </div>
  ';
    }
    else
    {
        $message = '
  <div class="alert alert-success">
  There is an error in Registration
  </div>
  ';
    }
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Arist Registration</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .box
        {
            width:800px;
            margin:0 auto;
        }
        .active_tab1
        {
            background-color:#fff;
            color:#333;
            font-weight: 600;
        }
        .inactive_tab1
        {
            background-color: #f5f5f5;
            color: #333;
            cursor: not-allowed;
        }
        .has-error
        {
            border-color:#cc0000;
            background-color:#ffff99;
        }
    </style>
</head>
<body>
<br />
<div class="container box">
    <br />
    <h2 align="center">Registration Form for Artists</h2><br />
    <?php echo $message; ?>
    <form method="post" id="register_form">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Login Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Personal Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Contact Details</a>
            </li>
        </ul>
        <div class="tab-content" style="margin-top:16px;">
            <div class="tab-pane active" id="login_details">
                <div class="panel panel-default">
                    <div class="panel-heading">Login Details</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Enter Email </label>
                            <input type="text" name="email" id="email" class="form-control" />
                            <span id="error_email" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Enter Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
                            <span id="error_password" class="text-danger"></span>
                        </div>
                        <br />
                        <div align="center">
                            <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="personal_details">
                <div class="panel panel-default">
                    <div class="panel-heading">Fill Personal Details</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Enter First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" />
                            <span id="error_firstname" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Enter Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" />
                            <span id="error_lastname" class="text-danger"></span>
                            <div class="form-group">
                                <label>Enter Alias</label>
                                <input type="text" name="alias" id="alias" class="form-control" />
                                <span id="error_alias" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Your Skills</label>
                                <input type="text" name="skills" id="skills" class="form-control" />
                                <span id="error_skills" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Your Education</label>
                                <input type="text" name="education" id="education" class="form-control" />
                                <span id="error_education" class="text-danger"></span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="male" checked> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="female"> Female
                            </label>
                        </div>
                        <br />
                        <div align="center">
                            <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
                            <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact_details">
                <div class="panel panel-default">
                    <div class="panel-heading">Fill Contact Details</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Enter Your Country</label>
                            <input type="text" name="country" id="country" class="form-control" />
                            <span id="error_country" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Enter Your State</label>
                            <input type="text" name="state" id="state" class="form-control" />
                            <span id="error_state" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Enter Your City</label>
                            <input type="text" name="city" id="city" class="form-control" />
                            <span id="error_city" class="text-danger"></span>
                        </div>
                        <br />
                        <div align="center">
                            <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
                            <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>

<script> // For checking the Fields Inputs as well as handling the Form
    $(document).ready(function(){
        0
        $('#btn_login_details').click(function(){

            var error_email = '';
            var error_password = '';
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if($.trim($('#email').val()).length == 0)
            {
                error_email = 'Email is required';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');
            }
            else
            {
                if (!filter.test($('#email').val()))
                {
                    error_email = 'Invalid Email';
                    $('#error_email').text(error_email);
                    $('#email').addClass('has-error');
                }
                else
                {
                    error_email = '';
                    $('#error_email').text(error_email);
                    $('#email').removeClass('has-error');
                }
            }

            if($.trim($('#password').val()).length == 0)
            {
                error_password = 'Password is required';
                $('#error_password').text(error_password);
                $('#password').addClass('has-error');
            }
            else
            {
                error_password = '';
                $('#error_password').text(error_password);
                $('#password').removeClass('has-error');
            }

            if(error_email != '' || error_password != '')
            {
                return false;
            }
            else
            {
                $('#list_login_details').removeClass('active active_tab1');
                $('#list_login_details').removeAttr('href data-toggle');
                $('#login_details').removeClass('active');
                $('#list_login_details').addClass('inactive_tab1');
                $('#list_personal_details').removeClass('inactive_tab1');
                $('#list_personal_details').addClass('active_tab1 active');
                $('#list_personal_details').attr('href', '#personal_details');
                $('#list_personal_details').attr('data-toggle', 'tab');
                $('#personal_details').addClass('active in');
            }
        });

        $('#previous_btn_personal_details').click(function(){
            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#personal_details').removeClass('active in');
            $('#list_personal_details').addClass('inactive_tab1');
            $('#list_login_details').removeClass('inactive_tab1');
            $('#list_login_details').addClass('active_tab1 active');
            $('#list_login_details').attr('href', '#login_details');
            $('#list_login_details').attr('data-toggle', 'tab');
            $('#login_details').addClass('active in');
        });

        $('#btn_personal_details').click(function(){
            var error_firstname = '';
            var error_lastname = '';
            var error_alias = '';
            var error_skills = '';
            var error_education = '';

            if($.trim($('#firstname').val()).length == 0)
            {
                error_firstname = 'First Name is required';
                $('#error_firstname').text(error_firstname);
                $('#firstname').addClass('has-error');
            }
            else
            {
                error_firstname = '';
                $('#error_firstname').text(error_firstname);
                $('#firstname').removeClass('has-error');
            }

            if($.trim($('#lastname').val()).length == 0)
            {
                error_lastname = 'Last Name is required';
                $('#error_lastname').text(error_lastname);
                $('#lastname').addClass('has-error');
            }
            else
            {
                error_lastname = '';
                $('#error_lastname').text(error_lastname);
                $('#lastname').removeClass('has-error');
            }
            if($.trim($('#alias').val()).length == 0)
            {
                error_alias = 'Alias is required';
                $('#error_alias').text(error_alias);
                $('#alias').addClass('has-error');
            }
            else
            {
                error_alias = '';
                $('#error_alias').text(error_alias);
                $('#alias').removeClass('has-error');
            }
            if($.trim($('#skills').val()).length == 0)
            {
                error_skills = 'Skill is required';
                $('#error_skills').text(error_skills);
                $('#skills').addClass('has-error');
            }
            else
            {
                error_skills = '';
                $('#error_skills').text(error_skills);
                $('#skills').removeClass('has-error');
            }
            if($.trim($('#education').val()).length == 0)
            {
                error_education = 'Education is required';
                $('#error_education').text(error_education);
                $('#education').addClass('has-error');
            }
            else
            {
                error_education = '';
                $('#error_education').text(error_education);
                $('#education').removeClass('has-error');
            }


            if(error_firstname != '' || error_lastname != ''|| error_alias != ''|| error_skills != ''|| error_education != '')
            {
                return false;
            }
            else
            {
                $('#list_personal_details').removeClass('active active_tab1');
                $('#list_personal_details').removeAttr('href data-toggle');
                $('#personal_details').removeClass('active');
                $('#list_personal_details').addClass('inactive_tab1');
                $('#list_contact_details').removeClass('inactive_tab1');
                $('#list_contact_details').addClass('active_tab1 active');
                $('#list_contact_details').attr('href', '#contact_details');
                $('#list_contact_details').attr('data-toggle', 'tab');
                $('#contact_details').addClass('active in');
            }
        });

        $('#previous_btn_contact_details').click(function(){
            $('#list_contact_details').removeClass('active active_tab1');
            $('#list_contact_details').removeAttr('href data-toggle');
            $('#contact_details').removeClass('active in');
            $('#list_contact_details').addClass('inactive_tab1');
            $('#list_personal_details').removeClass('inactive_tab1');
            $('#list_personal_details').addClass('active_tab1 active');
            $('#list_personal_details').attr('href', '#personal_details');
            $('#list_personal_details').attr('data-toggle', 'tab');
            $('#personal_details').addClass('active in');
        });

        $('#btn_contact_details').click(function(){
            var error_city = '';
            if($.trim($('#city').val()).length == 0)
            {
                error_city = 'city is required';
                $('#error_city').text(error_city);
                $('#city').addClass('has-error');
            }
            else
            {
                error_city = '';
                $('#error_city').text(error_city);
                $('#city').removeClass('has-error');
            }
            // todo has to be adapted

            if(error_city != '')
            {
                return false;
            }
            else
            {
                $('#btn_contact_details').attr("disabled", "disabled");
                $(document).css('cursor', 'prgress');
                $("#register_form").submit();
            }

        });

    });
</script>