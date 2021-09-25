<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style type="text/css">
        input[type=text],[type=email],[type=mobile],[type=password]{
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        input[type=submit] {
          width: 100%;
          background-color: orange;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        input[type=submit]:hover {
          background-color: #f2db05;
          color: black;
        }

        div {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        .demo{
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="main">
    

                        <h2>Sign up</h2>
                        <form method="POST" id="register-form" action="register.php">
                        
                            <div>
                                <label for="fname">First Name</label>
                                <input type="text" name="first_name" id="first_name" required="_required" placeholder="First Name"/>
                            </div>
                            <div >
                                <label for="lname">Last Name</label>
                                <input type="text" name="last_name" id="last_name" required="_required" placeholder="Last Name"/>
                            </div>
                            <div>
                                <label for="username">User Name</label>
                                <input type="text" name="username" id="username" required="_required" placeholder="username"/>
                            </div>
                            <div>
                                 <label for="email">Email</label>
                                <input type="email" name="email" id="email" required="_required" placeholder="Your Email"/>
                            </div>
                            <div>
                                <label for="Phone">User Phone No.</label>
                                <input type="mobile" name="mobile" id="mobile"required="_required" placeholder="Your Mobile Number"/>
                            </div>
                            <div>
                                 <label for="pass">User Password</label>
                                <input type="password" name="password_1" id="password_1"required="_required" placeholder="Password"/>
                            </div>
                            <div>
                                 <label for="re-pass">Re-Password</label>
                                <input type="password" name="password_2" id="password_2"required="_required" placeholder="Repeat your password"/>
                            </div>
                         <div>
                            <input type="submit" name="reg_user" id="reg_user" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="demo">
                       
                        <a href="login.php"  >I am already member</a>
                    </div>
       
    </div>


</body>
</html>