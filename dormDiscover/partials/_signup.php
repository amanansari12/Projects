<!-- Signup Modal -->

<div class="modal fade " id="SignupModal" tabindex="-1" aria-labelledby="SignupModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="SignupModalLabel">Sign Up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="partials/handlers/_signupHandel.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" name="name">

                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact No</label>
                        <input type="tel" class="form-control" id="contact" pattern="\d{10}" aria-describedby="contact" name="contact">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="username" name="username">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="pass">
                    </div>
                    <div class="mb-3">
                        <label for="cnfPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cnfPassword" name="cnfPass">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>