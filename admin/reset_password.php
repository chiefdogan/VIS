<?php

include("../includes/check_login.php");
check_login();

error_reporting(0);

?>

<!-- Include Bootstrap 4 CSS and JS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reset-password-modal">
  Reset Password
</button>

<!-- Modal -->
<div class="modal fade" id="reset-password-modal" tabindex="-1" role="dialog" aria-labelledby="reset-password-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reset-password-modal-label">Reset Password</h5>
      </div>
      <div class="modal-body">
        <p>Please wait while we reset your password...</p>
      </div>
    </div>
  </div>
</div>

