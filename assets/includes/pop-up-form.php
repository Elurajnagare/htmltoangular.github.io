<div class="pop_wrap text-center">	
	<h3 class="d-inline-block">Send Us a Message Now</h3>
	<button class="close_btn">X</button>
	<div class="form_box">
		<form id="quoteFormPopup">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" placeholder="First Name" name="strName" id="strName" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <input type="text" placeholder="Surname" name="strSurname" id="strSurname" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="email" placeholder="Email Address" name="strEmail" id="strEmail" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" placeholder="Phone Number" maxlength="11" name="intPhone" id="intPhone" class="form-control" onkeydown="return checkPhoneKey(event.key)">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" placeholder="Your Address" name="strAddress" id="strAddress" class="form-control">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<textarea placeholder="Write your message" name="strMessage" id="strMessage" class="form-control"></textarea>
					</div>
				</div>
				<div class="col-md-12 text-left">
					<label class="d-block text-left">Please prove you're human:</label>
					<div class="g-recaptcha" data-sitekey="6LfbccIUAAAAAMfiAiogiR8eeZZuZ8ysx8Q78gOw">
					</div>
					<span id="capchaErr1" class="error d-inline-block"></span>
				</div>
				<div class="col-sm-12">
					<div class="form-group btn_wrap">
						<input type="submit" id="btnSubmit1" name="submit" value="send" class="btn w-100 text-uppercase form-control">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>