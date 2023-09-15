 <!-- Login Modal -->


 <div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
     <div class=" modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="partials/handlers/_loginHandel.php" method="post">
                     <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Username</label>
                         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                     </div>
                     <div class="mb-3">
                         <label for="exampleInputPassword1" class="form-label">Password</label>
                         <input type="password" class="form-control" id="exampleInputPassword1" name="password">
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