 	<style type="text/css">
 		/* Absolute Center Spinner */
		.loading {
			display: none;
		  position: fixed;
		  z-index: 999;
		  height: 2em;
		  width: 2em;
		  overflow: show;
		  margin: auto;
		  top: 0;
		  left: 0;
		  bottom: 0;
		  right: 0;
		}

		/* Transparent Overlay */
		.loading:before {
		  content: '';
		  display: block;
		  position: fixed;
		  top: 0;
		  left: 0;
		  width: 100%;
		  height: 100%;
		  background-color: rgba(0,0,0,0.3);
		}

		/* :not(:required) hides these rules from IE9 and below */
		.loading:not(:required) {
		  /* hide "loading..." text */
		  font: 0/0 a;
		  color: transparent;
		  text-shadow: none;
		  background-color: transparent;
		  border: 0;
		}

		.loading:not(:required):after {
		  content: '';
		  display: block;
		  font-size: 10px;
		  width: 1em;
		  height: 1em;
		  margin-top: -0.5em;
		  -webkit-animation: spinner 1500ms infinite linear;
		  -moz-animation: spinner 1500ms infinite linear;
		  -ms-animation: spinner 1500ms infinite linear;
		  -o-animation: spinner 1500ms infinite linear;
		  animation: spinner 1500ms infinite linear;
		  border-radius: 0.5em;
		  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
		  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
		}

		/* Animation */

		@-webkit-keyframes spinner {
		  0% {
		    -webkit-transform: rotate(0deg);
		    -moz-transform: rotate(0deg);
		    -ms-transform: rotate(0deg);
		    -o-transform: rotate(0deg);
		    transform: rotate(0deg);
		  }
		  100% {
		    -webkit-transform: rotate(360deg);
		    -moz-transform: rotate(360deg);
		    -ms-transform: rotate(360deg);
		    -o-transform: rotate(360deg);
		    transform: rotate(360deg);
		  }
		}
		@-moz-keyframes spinner {
		  0% {
		    -webkit-transform: rotate(0deg);
		    -moz-transform: rotate(0deg);
		    -ms-transform: rotate(0deg);
		    -o-transform: rotate(0deg);
		    transform: rotate(0deg);
		  }
		  100% {
		    -webkit-transform: rotate(360deg);
		    -moz-transform: rotate(360deg);
		    -ms-transform: rotate(360deg);
		    -o-transform: rotate(360deg);
		    transform: rotate(360deg);
		  }
		}
		@-o-keyframes spinner {
		  0% {
		    -webkit-transform: rotate(0deg);
		    -moz-transform: rotate(0deg);
		    -ms-transform: rotate(0deg);
		    -o-transform: rotate(0deg);
		    transform: rotate(0deg);
		  }
		  100% {
		    -webkit-transform: rotate(360deg);
		    -moz-transform: rotate(360deg);
		    -ms-transform: rotate(360deg);
		    -o-transform: rotate(360deg);
		    transform: rotate(360deg);
		  }
		}
		@keyframes spinner {
		  0% {
		    -webkit-transform: rotate(0deg);
		    -moz-transform: rotate(0deg);
		    -ms-transform: rotate(0deg);
		    -o-transform: rotate(0deg);
		    transform: rotate(0deg);
		  }
		  100% {
		    -webkit-transform: rotate(360deg);
		    -moz-transform: rotate(360deg);
		    -ms-transform: rotate(360deg);
		    -o-transform: rotate(360deg);
		    transform: rotate(360deg);
		  }
		}
		#copyright{
			    text-align: center;
		    margin-top: 25px;
		    color: #99aabb;
		    font-size: .9em;
		}
 	</style>
 	<footer id="top-footer">
 		<section class="container">
 			<div class="row">
 				<div class="col-sm-2 col-xs-12">
 					<a class="navbar-brand" href="<?php echo base_url(); ?>"><span class="color-orange font-2">Trendle</span><span class="color-bluegreen font-2">Deals</span></a>
					<a class="navbar-brand" href="https://www.facebook.com/trendledeals" target="_blank">
						<small><i class=" fa fa-facebook-square" aria-hidden="true"></i> <label style="font-size:.7em; color:white;" class="">Facebook.com</label></small>
					</a>
				</div>

 				<div class="col-sm-4 col-xs-12">
 					<h4 class="heading">Disclaimer</h4>
 					<p class="disclaimer">
 						Trendle Deals is an independent service
						provider and in no way affiliated with Amazon or
						any of its subsidiaries
 					</p>
 				</div>

 				<div class="col-sm-2 col-xs-12">
 					<ul class="ul-format-1 info-links">
 					
 						<li>
 							<a href="<?php echo base_url(); ?>contact">Contact Us</a>
 						</li>
 						<li>
 							<a href="">Privacy Policy</a>
 						</li>
 						<li>
 							<a href="">Terms and Condition</a>
 						</li>
 						<li>
 							<a href="<?php echo base_url(); ?>faq" target="_blank">FAQ</a>
 						</li>
 					</ul>
 				</div>

 				<div class="col-sm-1">
 				</div>

 				<div class="col-sm-3 col-xs-12">
 					<h4 class="heading">Newsletter</h4>
					<input type="email" class="form-control input-darkest" placeholder="Enter your email address..."
						   name="fld-email" id="fld-email">
					<button class="btn btn-bluegreen btn-subscribe" style="margin-top: 10px;">Subscribe now</button>
 				</div>


 			</div>
 			<div class="row">
 				<div class="col-sm-12 col-xs-12" id="copyright">
 					<span>© 2016 Trendle Deals. All rights Reserved</span>
 				</div>
 			</div>
 		</section>
 	</footer>

 	<!-- <footer id="bottom-footer">
 		<section class="container">
 			<div class="row">
 				<div class="col-sm-12 col-xs-12">
 					<span>© 2016 Trendle Deals. All rights Reserved</span>
 				</div>
 				<div class="col-sm-4">
 					<ul class="ul-format-2 footer-links">
 						<li>
 							<a href="">Privacy Policy</a>
 						</li>
 						<li>
 							<a href="">Terms and Condition</a>
 						</li>
 					</ul>
 				</div>
 			</div>
 		</section>
 	</footer> -->

<div class="loading">Loading&#8230;</div>

