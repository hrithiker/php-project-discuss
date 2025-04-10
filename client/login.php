<div class="container">
    <div class="col-12 text-center">
        <h1>Login</h1>
    </div>

    <form method="POST" action="/discuss-project/server/requests.php">
        <div class="mb-3 col-6 offset-sm-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3 col-6 offset-sm-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="mb-3 col-6 offset-sm-3">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
