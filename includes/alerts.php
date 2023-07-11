<?php

//includes the file for user permission
include("../includes/check_login.php");
check_login();



?>

<!-- Alerts 
          <section class="comp-section" id="comp_alerts">
            <h3 class="section-title">Alerts</h3>
            <div>
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> There was a problem with your <a href="#" class="alert-link">network connection</a>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> A <a href="#" class="alert-link">problem</a> has been occurred while submitting your data.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your <a href="#" class="alert-link">message</a> has been sent successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Note!</strong> Please read the <a href="#" class="alert-link">comments</a> carefully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-light alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-dark alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </section>
         /Alerts -->
<section class="comp-section" id="comp_alerts">
<div class="alert alert-dismissible fade show" role="alert" id="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <span id="alert-message"></span>
</div>
</section>

<?php
function generateAlert($message, $type = 'success') {
  $js = "<script>";
  $js .= "document.getElementById('alert-message').innerHTML = '$message';";
  $js .= "document.getElementById('alert').classList.remove('alert-success', 'alert-danger');";
  $js .= "document.getElementById('alert').classList.add('alert-$type');";
  $js .= "document.getElementById('alert').style.display = 'block';";
  $js .= "</script>";
  return $js;
}

?>