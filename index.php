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
    } elseif (isset($_GET['u-id'])) {
        $uid = $_SESSION['user']['user_id'];
        include('./client/questions.php');
    } elseif (isset($_GET['latest'])) {
        include('./client/questions.php');
    } elseif (isset($_GET['search'])) {
        $search = $_GET['search'];
        include('./client/questions.php');
    } else {
        include('./client/questions.php');
    }

    include('./client/footer.php');
    ?>

    <!-- ✅ Bootstrap JS Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- ✅ Optional helper to close dropdown/collapse after clicking a link -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.navbar-nav a').forEach(link => {
                link.addEventListener('click', () => {
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                        new bootstrap.Collapse(navbarCollapse, {
                            toggle: true
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>