<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['user'] ?? null;
$username = $user['username'] ?? null;
$userId = $user['user_id'] ?? null;
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="./">
            <img src="./public/discuss.webp" alt="iso">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Added me-auto to push search form to right -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>

                <?php if ($username): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./server/requests.php?logout=true">
                            Logout (<?php echo ucfirst(htmlspecialchars($username)); ?>)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?ask=true">Ask A Question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?u-id=<?php echo $_SESSION['user']['user_id'] ?>">My Questions</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?signup=true">SignUp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?login=true">Login</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="?latest=true">Latest Questions</a>
                </li>
            </ul>

            <!-- Moved search form inside collapse and added mobile styling -->
            <form class="d-flex mt-3 mt-lg-0" action="">
                <input class="form-control me-2" name="search" type="search" placeholder="Search questions">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>