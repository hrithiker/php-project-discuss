<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discuss-project</title>
    <?php include('./client/commonFiles.php'); ?>
</head>

<body>
    <?php
    session_start();
    include('./client/commonFiles.php');
    include('./client/header.php');

    $user = $_SESSION['user'] ?? null;
    $username = $user['username'] ?? null;

    if (isset($_GET['signup']) && !$username) {
        include('./client/signUp.php');
    } elseif (isset($_GET['login']) && !$username) {
        include('./client/login.php');
    } elseif (isset($_GET['ask']) && $username) {
        // Only allow logged-in users to ask questions
        include('./client/ask.php');
    } elseif (isset($_GET['q-id'])) {
        // Only allow logged-in users to view question details
        $qid = $_GET['q-id'];
        include('./client/questiondetail.php');
    } else if (isset($_GET['u-id'])) {
        $uid = $_SESSION['user']['user_id'];;
        include('./client/questions.php');
    } else if (isset($_GET['latest'])) {
        include('./client/questions.php');
    } else if (isset($_GET['search'])) {
        $search  = $_GET['search'];
        include('./client/questions.php');
    } else {
        include('./client/questions.php');
    }
    //  else {
    //     if ($username) {
    //         // echo "Here are some of the latest questions:";
    //         include('./client/questions.php');
    //         // echo "<h3>HI! Welcome back, <span class='text-primary'>" . ucfirst(htmlspecialchars($username)) . "</span> 👋</h3>";


    //     } else {
    //         echo "<h2> HI! Welcome to Discuss HOMEPAGE  👋</h2>";
    //     }
    //     echo '</div>';
    // }
    ?>

</body>

</html>