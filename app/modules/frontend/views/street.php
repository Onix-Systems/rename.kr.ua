
<h1 class='page-title'>
	Як переіменували в м. Кіровоград вулицю <?= $street['old_name'] ?>?
</h1>

<div class="page-body street" >	
	<h2>
		<?= $area['old_name'] ?> (<?= $area['new_name'] ?>)
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

	<!-- Google Maps Кіровограду, и отметить на ней текущую улицу/  -->
	<div id="map-canvas" style="height:390px;"></div>
	<input type="hidden" value='Кировоград, <?= $street['old_name'] ?>' id='address'>
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
      mapTypeId: google.maps.MapTypeId.ROADMAP
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
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }
</script>




