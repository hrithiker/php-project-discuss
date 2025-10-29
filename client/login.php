<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Login</h1>
        </div>
    </div>

    <form method="POST" action="/discuss-project/server/requests.php">
        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4 text-center">
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </div>
        </div>
    </form>
</div>