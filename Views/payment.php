<hr style="width: 96%; margin-left: 26px; margin-top: 10px; margin-bottom: 10px;"/>
	<h3 style="margin-left: 40px;">Pay For Parking</h3>
<hr style="width: 96%; margin-left: 26px; margin-top: 10px; margin-bottom: 10px;"/>


<div class="garages">
	<h5 style="margin-left: 82px;">Choose A Garage:</h5>
	<select id="garages"style="margin-left: 60px; margin-bottom: 10px;" onChange="displayGarage(this)">
	  <option id="" value="-1">Select A Garage</option>
	  <option id="cag" value="1">Conley Avenue Garage</option>
	  <option id="hsg" value="2">Hitt Street Garage</option>
	  <option id="taps" value="3">Tiger Avenue Parking Structure</option>
	  <option id="tag" value="4">Turner Avenue Garage</option>
	  <option id="uag" value="5">University Avenue Garage</option>
	  <option id="vag" value="6">Virginia Avenue Garage</option>
	  <option id="ps7" value="7">Parking Structure #7</option>
	</select>
	<img class="garageImage" src="../img/cag.png"/>
</div>

<div class="duration">
	<h5 style="margin-left: 50px;">Choose Park Duration:</h5>
	<select id="durations" style="margin-left: 75px; margin-bottom: 10px;" onChange="displayTime(this)">
	  <option value="00:30:00">30 minutes</option>

	  <option value="01:00:00">1 hour</option>
	  <option value="01:30:00">1 hour 30 minutes</option>

	  <option value="02:00:00">2 hours</option>
	  <option value="02:30:00">2 hours 30 minutes</option>

	  <option value="03:00:00">3 hours</option>
	  <option value="03:30:00">3 hours 30 minutes</option>

	  <option value="04:00:00">4 hours</option>
	  <option value="04:30:00">4 hours 30 minutes</option>

	  <option value="05:00:00">5 hours</option>
	  <option value="05:30:00">5 hours 30 minutes</option>

	  <option value="06:00:00">6 hours</option>
	  <option value="06:30:00">6 hours 30 minutes</option>

	  <option value="07:00:00">7 hours</option>
	  <option value="07:30:00">7 hours 30 minutes</option>


	  <option value="08:00:00">8 hours</option>
	  <option value="08:30:00">8 hours 30 minutes</option>

	  <option value="09:00:00">9 hours</option>
	  <option value="09:30:00">9 hours 30 minutes</option>

	  <option value="10:00:00">10 hours</option>
	</select>

	<i class="clock icon-clock"></i>
	<h3 class="time">30 Minutes</h3>
</div>

<div class="orderSummary">
	<h5 style="margin-left: 50px;">Review Your Order:</h5>
	
	<div class="row" style="margin-top: 10px;">
		<div class="twelve columns centered">
			<h6 class="garageText">Garage: </h3>
			<h6 class="garage">No Garage Selected</h3>
		</div>
	</div>

	<div class="totalDurationRow row">
		<div class="twelve columns centered">
			<h6 class="totalDurationText">Duration: </h3>
			<h6 class="totalDuration">30 minutes</h3>
		</div>
	</div>

	<div class="row" style="margin-top: 10px;">
		<div class="twelve columns centered">
			<h6 class="priceText">Price: </h3>
			<h6 class="price">$0.60 (Per Hour)</h3>
		</div>
	</div>

	<div class="row" style="margin-top: 10px;">
		<div class="twelve columns centered">
			<h6 class="totalPriceText">Total Price: </h3>
			<h6 class="totalPrice">N/A</h3>
		</div>
	</div>

	<div class="row" style="margin-top: 10px;">
		<div class="twelve columns centered">
			<div class="payForParking medium btn" onclick="payForParking()">Pay For Parking</div>
		</div>
	</div>
</div>
	<hr class="footerhr"/>
	<div class="footer">
		<div class="row" style="margin-top: 20px;">
			<div class="twelve columns centered text-center">
				<div style="float: left; margin-right: 5px;">| <a class="linkHover" href="#" onclick="loadPage('privacyPolicy')" style="margin-right: 5px;">Privacy Policy</a>|</div>
				<div style="float: left; margin-right: 5px;"><a class="linkHover" href="#" onclick="loadPage('about')" style="margin-right: 12px;">About</a>|</div>
				<div style="float: left; margin-right: 5px;"><a class="linkHover" href="#" onclick="loadPage('disclaimer')" style="margin-right: 5px;">Disclaimer</a>|</div>
			</div>
		</div>
	</div>
</div>