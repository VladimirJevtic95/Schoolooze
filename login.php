<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Schoolooze</title>

    <!-- css login style -->
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>

    <div class="login_space">

        <form action="" class="form">

            <img src="img/Schoolooze1500.png" alt="">
            <h2>Login</h2>

            <div class="input">
                <input type="username" name="login_username" id="login_username" required>
                <label for="login_username">Username or Email</label>
            </div>

            <div class="input">
                <input type="password" name="login_password" id="login_password" required>
                <label for="login_password">Password</label>
            </div>

            <input type="submit" value="Sign In" class="click_submit">

            <a href="#forgot_password" class="forgot_password">Forgot password</a>

        </form>

        <div id="forgot_password">

            <form action="" class="form">

                <a href="#" class="close">&times;</a>
                <h2>Restore Password</h2>

                <div class="input">
                    <input type="email" name="forgot_email" id="forgot_email" required>
                    <label for="forgot_email">Email</label>
                </div>

                <input type="submit" value="Submit" class="click_submit">

            </form>

        </div>

    </div>

</body>

</html>