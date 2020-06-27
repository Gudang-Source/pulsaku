<center>
    <div class="col-md-6 mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 style="color: white;">Login Page</h3>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('login/login_form') ?>">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>USERNAME</b></label>
                        <input type="text" class="form-control" id="username" placeholder="USERNAME" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"><b>PASSWORD</b></label>
                        <input type="password" class="form-control" id="password" placeholder="PASSWORD" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <h2>Username : admin Pass : admin</h2>
            </div>
        </div>
    </div>
</center>