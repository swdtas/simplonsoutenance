<!-- login modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header bg-theme1">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post" class="p-3">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Username</label>
                    <input type="text" class="form-control" placeholder=" " name="Name" id="recipient-name"
                        required="">
                </div>
                <div class="form-group">
                    <label for="password" class="col-form-label">Password</label>
                    <input type="password" class="form-control" placeholder=" " name="Password" id="password"
                        required="">
                </div>
                <div class="right-w3l">
                    <input type="submit" class="form-control bg-theme" value="Login">
                </div>
                <div class="row sub-w3l my-3">
                    <div class="col sub-w3ltd">
                        <input type="checkbox" id="brand1" value="">
                        <label for="brand1" class="text-dark">
                            <span></span>Remember me?</label>
                    </div>
                    <div class="col forgot-w3l text-right">
                        <a href="#" class="text-dark">Forgot Password?</a>
                    </div>
                </div>
                <p class="text-center dont-do">Don't have an account?
                    <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-dark">
                        <strong>Register Now</strong></a>
                </p>
            </form>
        </div>
    </div>
</div>
</div>
<!-- //login modal -->

<button type="button" class="btn w3ls-btn btn-2 ml-lg-1 text-uppercase font-weight-bold d-block"
data-toggle="modal" aria-pressed="false" data-target="#exampleModal">
Sign in
</button>
