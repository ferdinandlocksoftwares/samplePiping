<section>
	<div class="container">

		<div class="row">
			<div class="col-sm-12 col-md-2"></div>
			<div class="col-sm-12 col-md-8">
				<h2>Register</h2>	

			 <div class="col-md-12" id="error-container"></div>
			<span id="error-message" name="error-message"></span>

			<br/>
			<form form id="frm-signup-reviewer" name="frm-signup-reviewer" class="form-horizontal">
	               <div class="form-group">
                  <div class="col-sm-12">
                  	<label>Country</label>
                  	<select name="fld-country" id="fld-country"  class="form-control select-dark-ghost">

						<?php 

						foreach($countries as $country)

						{

						?>

						<option value="<?php echo $country["country_code"];?>"><?php echo $country["country_name"];?></option>

						<?php	

						}

						?>

					</select>                  
                  </div>
                </div>

	                <div class="form-group">
	                  <div class="col-sm-6 four-padding-right">
	                  	<label>First Name</label>
	                    <input type="text" class="form-control input-dark-ghost" name="fld-first-name" id="fld-first-name" placeholder="">
	                    <i class="flaticon-calendar-icons"></i> 
	                  </div>
	                  <div class="col-sm-6 four-padding-left">
	                  	<label>Last Name</label>
	                    <input type="text" class="form-control input-dark-ghost" name="fld-last-name" id="fld-last-name" placeholder="">
	                    <i class="flaticon-calendar-icons"></i> 
	                  </div>
	                </div>


	                <div class="form-group">
	                  <div class="col-sm-12"> 
	                  	<label>Email</label>                 	
	                  	<input type="text" class="form-control input-dark-ghost" name="fld-email" id="fld-email" placeholder="">                  	               
	                  </div>
	                </div>                
	                         

	                <div class="form-group">
	                  <div class="col-sm-6 four-padding-right">
	                  	<label>Password</label>
	                    <input type="password" ame="fld-password" id="fld-password" class="form-control input-dark-ghost" placeholder="">        
	                  </div>
	                  <div class="col-sm-6 four-padding-left">
	                  	<label>Confirm Password</label>                 
	                    <input type="password" name="fld-confirm-password" id="fld-confirm-password"  class="form-control input-dark-ghost" placeholder="" >                    
	                  </div>                  
	                </div>

	                <div class="form-group" id="alert-message" style="display:none">
	                  <div class="col-sm-12">
	                    <div class="alert alert-danger" role="alert">
	                      Hello!
	                    </div>
	                  </div>
	                </div> 
	                <br/>
	                <div class="col-md-12 text-center">
			            <!--notes to reviewer-->
			            <div class="form-group">

			                <input type="checkbox" name="fld-accept-terms" id="fld-accept-terms"><label for="fld-accept-terms">Accept Terms and Conditions</label>
			            </div>
			        </div>
	                <div class="form-group no-margin-bottom">                
		                <div class="col-sm-12">
		                    <button type="button" class="btn btn-bluegreen btn-block" id="btn-sign-up" name="btn-sign-up">Submit</button>
		                </div>
	                </div>

	              </form>
			</div>
			<div class="col-sm-12 col-md-2"></div>
		</div>


	</div>
</section>

	

<!-- </html> -->

		
