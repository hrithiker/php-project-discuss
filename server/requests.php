<?php
session_start();
include("../common/db.php");

// ✅ Handle logout at the top
if (isset($_GET['logout'])) {
    $_SESSION = [];          // Clear session data
    session_destroy();       // Destroy session
    header("Location: /discuss-project/index.php"); // Redirect to homepage
    exit();
}

// ✅ Handle signup
if (isset($_POST['signup'])) {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // ✅ Check if email already exists
    $checkStmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    // $user->insert_id;
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // Email already exists
        echo "<script>alert('Email already registered. Please use a different email.'); window.history.back();</script>";
        $checkStmt->close();
        exit();
    }
    $checkStmt->close();

    // ✅ Proceed with user creation
    $stmt = $conn->prepare("INSERT INTO `user` (`username`, `email`, `password`) VALUES (?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        $result = $stmt->execute();

        if ($result) {
            // ✅ Get the last inserted ID
            $userId = $stmt->insert_id;

            // ✅ Set session
            $_SESSION["user"] = [
                "user_id" => $userId,
                "username" => $username,
                "email" => $email
            ];

            header("Location: /discuss-project/index.php");
            exit();
        } else {
            echo "Failed to create user: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "SQL Error: " . $conn->error;
    }
}


// ✅ Handle login
if (isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if user exists
    $stmt = $conn->prepare("SELECT id, username, password FROM `user` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($user = $result->fetch_assoc()) {
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                "user_id" => $user['id'],
                "username" => $user['username'],
                "email" => $email
            ];
            header("Location: /discuss-project/index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User not found'); window.history.back();</script>";
    }

    // if (isset($_POST['login'])) {
    //     $email = $_POST['email'] ?? '';
    //     $password = $_POST['password'] ?? '';

    //     echo "Email entered: $email <br>";
    //     echo "Password entered: $password <br>";

    //     $stmt = $conn->prepare("SELECT id, username, password FROM `user` WHERE email = ?");
    //     $stmt->bind_param("s", $email);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     if ($user = $result->fetch_assoc()) {
    //         echo "Hash from DB: " . $user['password'] . "<br>";
    //         if (password_verify($password, $user['password'])) {
    //             echo "✅ Password verified<br>";
    //         } else {
    //             echo "❌ Password did not match<br>";
    //         }
    //     } else {
    //         echo "❌ No user found with that email<br>";
    //     }
    //     $stmt->close();
    // }


    $stmt->close();
} else if (isset($_POST["ask"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    // $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $question = $conn->prepare("Insert into `questions` (`id`,`title`,`description`,`user_id`)
                      values(NULL,'$title','$description','$user_id');
");

    $result = $question->execute();
    $question->insert_id;
    if ($result) {
        header("Location: ../index.php");
    } else {
        echo "Question is added to website";
    }
} else if (isset($_POST["answer"])) {
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $query = $conn->prepare("Insert into `answers` (`id`,`answer`,`question_id`,`user_id`)
                      values(NULL,'$answer','$question_id','$user_id');
");

    $result = $query->execute();
    $query->insert_id;
    if ($result) {
        header("Location: /discuss-project/index.php?q-id=$question_id");
    } else {
        echo "Answer is not submitted";
    }
} else if (isset($_GET["delete"])) {
    echo $qid = $_GET["delete"];
    $query = $conn->prepare("delete from questions where id =$qid");
    $result = $query->execute();
    if ($result) {
        header("Location: /discuss-project/index.php");
    } else {
        echo "Question not deleted";
    }
}
