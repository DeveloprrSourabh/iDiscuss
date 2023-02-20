<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form autocomplete="off" action="/forum/partials/_handlelogin.php" method= "post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Username</label>
                        <input autocomplete="off" type="text" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input autocomplete="off" type="password" class="form-control" id="loginPass" name="loginPass">
                    </div>
                    <div class="mb-3 form-check">
                        <input autocomplete="off" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>