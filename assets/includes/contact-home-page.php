<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="cotanct_form_wrap">
	<form id="quoteForm">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" placeholder="Name" name="strName" id="strName" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="email" placeholder="E-Mail" name="strEmail" id="strEmail" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" placeholder="Address" name="strLocation" id="strLocation" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" placeholder="Phone" maxlength="11" name="intPhone" id="intPhone" class="form-control" onkeydown="return checkPhoneKey(event.key)">
				</div>
			</div>
			
			
			<div class="col-md-12">
				<div class="form-group">
					<textarea placeholder="Write your Message" name="strMessage" id="strMessage" class="form-control"></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group captcha_wrap">
					<label>Please prove you're human:</label>
					<div class="g-recaptcha" data-sitekey="6Ldz1JAUAAAAALjuXFUsZkwbe2UvmQKIta7m2KzL"></div>
					<p id="capchaErr" class="error"></p>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group blue_btn mb-0">
					<input type="submit" id="btnSubmit" name="submit" value="Submit" class="btn form-control">
				</div>
			</div>
		</div>
	</form>
</div>