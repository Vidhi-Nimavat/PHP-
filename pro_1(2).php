<!--1. User Authentication Using Functions
Objective: To implement a user login system using user-defined functions, function calling,
and returning values.
Outcome: Students will understand how to modularize authentication logic and validate
credentials securely.-->
<?php
session_start();

// Sample user data (plain passwords for demo only, NOT recommended for real apps)
$users = [
    "aaa" => "aaa",
    "bbb" => "bbb",
    "ccc" => "ccc"
];

// Functions
function userExists($username, $users) {
    return isset($users[$username]);
}

function validatePassword($username, $password, $users) {
    return $users[$username] === $password;
}

function authenticate($username, $password, $users) {
    if (!userExists($username, $users)) {
        return "User does not exist.";
    }
    if (!validatePassword($username, $password, $users)) {
        return "Invalid password.";
    }
    return true;
}

// Handle logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: pro_1(2).php");
    exit();
}

// Handle login POST request
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = trim($_POST['username']);
    $inputPassword = trim($_POST['password']);

    $authResult = authenticate($inputUsername, $inputPassword, $users);

    if ($authResult === true) {
        $_SESSION['username'] = $inputUsername;
        // Redirect to avoid form resubmission
        header("Location: pro_1(2).php");
        exit();
    } else {
        $message = $authResult;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo isset($_SESSION['username']) ? 'Welcome' : 'User Login'; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2, h1 {
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 0;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: #d8000c;
            background-color: #ffbaba;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            font-size: 14px;
        }
        a.logout-link {
            display: inline-block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        a.logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
<?php if (isset($_SESSION['username'])): ?>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>You have successfully logged in.</p>
    <a href="pro_1(2).php?action=logout" class="logout-link">Logout</a>

<?php else: ?>
    <h2>User Login</h2>
    <?php if ($message): ?>
        <div class="error-message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required autofocus />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Log In</button>
    </form>
<?php endif; ?>
</div>

</body>
</html>
