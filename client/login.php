<?php
// 🔒 Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="mb-4">Login</h1>
        </div>
    </div>

    <form method="POST" action="/discuss-project/server/requests.php" autocomplete="off">

        <!-- 📧 Email -->
        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                    autocomplete="username">
            </div>
        </div>

        <!-- 🔐 Password -->
        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="new-password">
            </div>
        </div>

        <!-- 🚀 Button -->
        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4 text-center">
                <button type="submit" name="login" class="btn btn-primary w-100">
                    Login
                </button>
            </div>
        </div>

        <!-- 🔗 Extra link -->
        <div class="row">
            <div class="text-center mt-2">
                <small>
                    Don't have an account?
                    <a href="?signup=true">Create an account</a>
                </small>
            </div>
        </div>

    </form>
</div>
<script>
    window.onload = function() {
        document.getElementById("password").value = "";
    };
</script>