
<h1 class='page-title'>
	Як переіменували в м. Кіровоград вулицю <span style='font-weight: 500'><?= $street['old_name'] ?></span>?
</h1>

<div class="page-body street" >	
	<h2>
		Район: <b><?= $area['new_name'] ?> (<?= $area['old_name'] ?>)</b>
	</h2>
	<h3>
		<?= $street['object_type'] ?>
	</h3>

	<p>
		<label>
			Нова назва:
		</label>
		<b>
			<?= $street['new_name'] ?>
		</b>
	</p>
	<p>
		<label>
			Стара назва:
		</label>
		<b>
			<?= $street['old_name'] ?>
		</b>
	</p>

	<p>
		<b>
			<?= $street['date_and_number_of_resolve'] ?>
		</b>
	</p>

	<p>
		
		<?php if($street['eponim']): ?>
             <?php 
                $res = false;
                foreach (['', 'Особа', 'Об’єкт', 'Історична назва', 'Суб’єкт'] as $key => $value) 
                   if ($street['eponim_type'] == $key) 
                      $res = ($street['eponim'] && $street['eponim'] != 'історична назва') ? '<a href="'.$street['eponim'].'" target="__blank">Названо на честь</a>' : $value;
                echo $res;
              ?>
          <?php endif; ?>
	</p>
	<?php 
		$text = false;
		switch ($street['resolve_date']) {
			case '16.12.2014':
				$text = 'Рішення Кіровоградської міської ради від 16.12.2014 № 3760 (<a href="http://www.kr-rada.gov.ua/files/decision/ua-rishennya-risenya-3760-16-12-14.pdf">http://www.kr-rada.gov.ua/files/decision/ua-rishennya-risenya-3760-16-12-14.pdf</a>)';
				break;
			case '19.02.2016':
				$text = 'Розпорядження «Про перейменування вулиць, провулків та інших об’єктів топоніміки міста» № 24 від 19.02.2016 (<a href="http://www.kr-rada.gov.ua/files/content/files/raspod-20160223115224.pdf">http://www.kr-rada.gov.ua/files/content/files/raspod-20160223115224.pdf</a>)';
				break;
			case '23.02.2016':
				$text = 'Рішення «Про перейменування вулиць, провулків та інших об’єктів топоніміки міста» Кіровоградської міської ради № 105 від 23.02.2016 р. (<a href="http://www.kr-rada.gov.ua/files/decision/ua-rishennya-risenya-105-23-02-16.pdf">http://www.kr-rada.gov.ua/files/decision/ua-rishennya-risenya-105-23-02-16.pdf</a>)';
				break;
			case '24.02.2014':
				$text = 'Рішення Кіровоградської міської ради від 24.02.2014 № 2881 (<a href="http://www.kr-rada.gov.ua/files/decision/ua-rishennya-rishenya-2881-24-02-14.pdf">http://www.kr-rada.gov.ua/files/decision/ua-rishennya-rishenya-2881-24-02-14.pdf</a>)';
				break;
			case '11.11.2014':
				$text = 'Рішення Кіровоградської міської ради від 11.11.2014 № 3613 (<a href="http://www.kr-rada.gov.ua/files/content/files/63-%2011.11.2014.pdf">http://www.kr-rada.gov.ua/files/content/files/63-%2011.11.2014.pdf</a>)';
				break;
		}

	?>
	<?php if ($text): ?>
		<p>
			<?= $text ?>
		</p>
	<?php endif ?>

	<!-- Google Maps Кіровограду, и отметить на ней текущую улицу/  -->
	<div id="map-canvas" style="height:390px;"></div>
	<input type="hidden" value='Кіровоград, <?= $street['old_name'] ?>' id='address'>
</div>



<script>
initialize();
  var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
		zoom: 16,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
		navigationControl: false,
		mapTypeControl: false,
		scaleControl: false,
    }
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    codeAddress();
  }

  function codeAddress() {
    var address = document.getElementById('address').value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        console.log('Geocode was not successful for the following reason: ' + status);
      }
    });
  }
</script>




