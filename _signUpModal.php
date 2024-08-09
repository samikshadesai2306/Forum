<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupmodal">SignUp for an iDiscuss Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="container">
            <form action ="_handelSignup.php" method ="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="signupmail" name ="signupmail" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text"></div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="singuppassword" name="singuppassword">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="singupcpassword" name="singupcpassword">
                </div>
                <div class="mb-3 form-check">
                    <button type="submit" class="btn btn-primary">SignUp</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>