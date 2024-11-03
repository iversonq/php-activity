<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
    <div class="container"><br>

    <?php
        $userAccounts = [
            'Admin' => [
                'admin' => 'Pass1234',
                'renmark' => 'Pogi1234'
            ],
            'Content Manager' => [
                'pepito' => 'manaloto',
                'juan' => 'delacruz'
            ],
            'System User' => [
                'pedro' => 'penduko'
            ]
        ];
    ?>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-signin'])): ?>
        <?php
            $userType = $_POST['user'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $validUser = isset($userAccounts[$userType][$username]) && $userAccounts[$userType][$username] === $password;
        ?>

        <?php
        if ($validUser) {
            echo '<div class="alert alert-success alert-dismissible fade show" style="max-width: 350px; margin: auto;">';   
            echo 'Welcome to the system, ' . htmlspecialchars($username) . '!';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" style="max-width: 350px; margin: auto;">';
            echo 'Invalid Username or Password.';
            echo '</div>';
        }
        ?>
    <?php endif; ?>

        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <form class="form-signin" method="post">
                <select name="user" id="user" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="Content Manager">Content Manager</option>
                    <option value="System User">System User</option>
                </select>

                <input type="text" name="username" id="username" class="form-control" placeholder="User Name" required autofocus>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="btn-signin">Sign in</button>
            </form>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
