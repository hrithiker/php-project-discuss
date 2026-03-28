<?php
session_start();
require_once("../common/db.php");


// =======================
// 🔀 ROUTING SYSTEM
// =======================

if (isset($_GET['logout'])) {

    // =======================
    // ✅ LOGOUT
    // =======================
    $_SESSION = [];
    session_destroy();
    header("Location: /discuss-project/index.php");
    exit();
} elseif (isset($_POST['signup'])) {

    // =======================
    // ✅ SIGNUP
    // =======================
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkStmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "<script>alert('Email already registered'); window.history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION["user"] = [
            "user_id" => $stmt->insert_id,
            "username" => $username,
            "email" => $email
        ];

        header("Location: /discuss-project/index.php");
        exit();
    }
} elseif (isset($_POST['login'])) {

    // =======================
    // ✅ LOGIN
    // =======================
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {

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
} elseif (isset($_POST["ask"])) {

    // =======================
    // ✅ ASK QUESTION
    // =======================
    if (!isset($_SESSION['user'])) {
        exit("Login required");
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO questions (title, description, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $description, $user_id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    }
} elseif (isset($_POST["submit_answer"])) {

    // =======================
    // ✅ SUBMIT ANSWER
    // =======================
    if (!isset($_SESSION['user'])) {
        exit("Login required");
    }

    $answer = trim($_POST['answer']);
    $question_id = (int)$_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    // 🔥 FIX: prevent blank answer
    if (empty($answer)) {
        exit("Answer cannot be empty");
    }

    $stmt = $conn->prepare("INSERT INTO answers (answer, question_id, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $answer, $question_id, $user_id);

    if ($stmt->execute()) {
        header("Location: /discuss-project/index.php?q-id=$question_id");
        exit();
    }
} elseif (isset($_GET["delete"])) {

    // =======================
    // ✅ DELETE QUESTION
    // =======================
    $qid = (int)$_GET["delete"];

    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->bind_param("i", $qid);

    if ($stmt->execute()) {
        header("Location: /discuss-project/index.php");
        exit();
    }
}
