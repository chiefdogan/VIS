<?php

//includes the file for user permission
include("../includes/check_login.php");
check_login();



?>

<!DOCTYPE html>
<html lang="en">

   <?php @include("../includes/head.php");?>
	
    <body>

			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <?php @include("../includes/sidebar.php");?>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">FAQ</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">FAQ</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="faq-card">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									<a class="collapsed" data-toggle="collapse" href="#collapseOne">What is the Visitors Information System?</a>
								</h4>
							</div>
							<div id="collapseOne" class="card-collapse collapse">
								<div class="card-body">
									<p>The Visitors Information System is an online platform that provides visitors with information about our organization, including hours of operation, events, and directions.</p>
									<p>A Visitor Information System is a software application designed to manage visitor data and streamline the visitor check-in process. It can also provide useful insights and analytics about visitor behavior and preferences.</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									<a class="collapsed" data-toggle="collapse" href="#collapseTwo">What are the benefits of using a Visitor Information System.?</a>
								</h4>
							</div>
							<div id="collapseTwo" class="card-collapse collapse">
								<div class="card-body">
									<p>A Visitor Information System offers several benefits, including:

										<li>Increased security and safety</li>
                                            <li>Improved visitor experience</li>
                                            <li>Streamlined check-in process</li>
                                            <li>More accurate visitor data collection</li>
                                           <li> Better insights into visitor behavior and preferences</li>
                                     </p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									<a class="collapsed" data-toggle="collapse" href="#collapseThree">Is there a fee to use the Visitors Information System?</a>
								</h4>
							</div>
							<div id="collapseThree" class="card-collapse collapse">
								<div class="card-body">
								<p>No, there is no fee to use the Visitors Information System. It is a free service provided by our organization.</p>
									<p>
										Can I use the Visitors Information System on my mobile device?<br>
                                         Answer: Yes, the Visitors Information System is mobile-friendly and can be accessed on any smartphone or tablet.
                                     </p>
                                     <p>Question: What information can I find on the Visitors Information System?<br>
                                     Answer: The Visitors Information System provides information about our organization, including hours of operation, events, directions, and frequently asked questions.
                                     </p>
                                     <p>Question: How often is the information on the Visitors Information System updated?<br>
                                     Answer: We strive to keep the information on the Visitors Information System as up-to-date as possible. However, we recommend that you always check with our organization for the latest information.</p>
                                     <p>Question: Can I provide feedback about the Visitors Information System?<br>
                                     Answer: Yes, we welcome feedback about the Visitors Information System. You can provide feedback by clicking on the "Feedback" button on the main page of the system.</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									<a class="collapsed" data-toggle="collapse" href="#collapseFour">Security and Privacy</a>
								</h4>
							</div>
							<div id="collapseFour" class="card-collapse collapse">
								<div class="card-body">
									<p>
                                     Is my data secure with your Visitor Information System?
                                     Yes, we take the security and privacy of your data very seriously. Our system is designed with advanced security measures to ensure that your data is protected.</p>
									
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									<a class="collapsed" data-toggle="collapse" href="#collapseFive">What happens to visitor data after they leave?</a>
								</h4>
							</div>
							<div id="collapseFive" class="card-collapse collapse">
								<div class="card-body">
									<p>
                                    Visitor data is stored securely in our system and can be accessed by authorized personnel. We do not share or sell visitor data to third parties.</p>
									
								</div>
							</div>

						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									<a class="collapsed" data-toggle="collapse" href="#collapseSix">Support</a>
								</h4>
							</div>
							<div id="collapseSix" class="card-collapse collapse">
								<div class="card-body">
									<p>              
                                    How do I get support for your Visitor Information System?<br><br><br>
                                    If you need technical support or have any questions about our Visitor Information System, please contact our support team at support@visitorsystem.com <br> or call us at +1 (555) 123-4567.<br><br>
                                    </p>
									
								</div>
							</div>
						</div>

                          <div class="card">
							<div class="card-header">
								<h4 class="card-title">
									<a class="collapsed" data-toggle="collapse" href="#collapseSeven">What are your support hours?</a>
								</h4>
							</div>
							<div id="collapseSeven" class="card-collapse collapse">
								<div class="card-body">
									<p>              
                                    Our support team is available<br><br> Monday through Friday from 9:00 am to 5:00 pm EST.
                                    </p>
									
								</div>
							</div>
						</div>

					</div>
					
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<?php @include("../includes/foot.php");?>
    </body>
</html>