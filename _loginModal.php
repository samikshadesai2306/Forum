<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">LogIn to iDiscuss</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="_handelLogin.php" method="POST">
                    <div class="mb-3">
                        <label for="loginemail" class="form-label">Username</label>
                        <input type="text" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="loginpass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginpass" name="loginpass">
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>  
        </div>
    </div>
</div>