$(function() {
	
	var search = '';

	var results = {};

	var html = ''; 


	var k = {};

	var htm = '';
	
	$.each($('.readyTable tbody .old_name'), function(index, val) {
		var index = $(this).text().substr(0,1).toUpperCase();

		if ($.isEmptyObject(k[index])) 
				k[index] = [];

		var parentNode = $(this).parent('.place-row');

		k[index].push({ new_name: parentNode.find('td.new_name'), old_name: parentNode.find('td.old_name'), about: parentNode.find('td.about')});
	});
	$.each(k, function(index, val) {
		 htm += '<tr style="background: #eaeaea;" class="keyword"><th scope="row" style="font-size: 20px;" class="delimeter" data-letter='+index+'>'+index+'</th><td></td><td></td><td></td></tr>';
		 if (val.length) {
		 	$.each(val, function(indexPlace, valPlace) {
		 		htm += '<tr class="place-row" ><th scope="row"></th><td class="old_name">'+valPlace.old_name.text()+'</td><td class="new_name">'+valPlace.new_name.text()+'</td><td class="about">'+valPlace.about.html()+'</td></tr>';
		 	});
		 }
	});

	$('.readyTable').find('tbody').html(htm);

	var currentHtml = htm;

	$(document).on('click', '.alphebet', function(event) {
		event.preventDefault();
		var aRow = $(document).find('.delimeter[data-letter="'+$(this).text()+'"]');
		if (aRow) {
			$('html, body').animate({
		        scrollTop: aRow.offset().top
		    }, 2000);
		}
	});

	$(document).on('keyup', 'input[name="placeInp"]', function(event) {
		event.preventDefault();
		if ( search == $(this).val() && !$(this).val())
			search = false;
		else
			search = $(this).val()

		if (search) {

			results = {};

			$.each($(currentHtml).find('.old_name, .new_name'), function(index, val) {


				var elText = $(this).text();
				
				if (elText && elText.toLowerCase().indexOf(search.toLowerCase()) >= 0) {

					if ($.isEmptyObject(results[elText.substr(0,1)])) 
						results[elText.substr(0,1)] = [];
						
					var parentNode = $(this).parent('.place-row');

					results[elText.substr(0,1)].push({ new_name:parentNode.find('td.new_name'), old_name:parentNode.find('td.old_name'), about: parentNode.find('td.about')});

				}

			});

			if (results) {

				html = '';

				$.each(results, function(index, val) {

					 html += '<tr style="background: #eaeaea;" class="keyword"><th scope="row" style="font-size: 20px;" class="delimeter" data-letter='+index+'>'+index+'</th><td></td><td></td><td></td></tr>';

					 if (val.length) {

					 	$.each(val, function(indexPlace, valPlace) {

					 		html += '<tr class="place-row" ><th scope="row"></th><td >'+valPlace.old_name.text().replace( new RegExp(search, 'i'), '<b>'+search+'</b>')+'</td><td>'+valPlace.new_name.text().replace( new RegExp(search, 'i'), '<b>'+search+'</b>')+'</td><td class="about">'+valPlace.about.html()+'</td></tr>';

					 	});

					 }
				});
				
				if (html) {
					$('tbody').click();
					$('.readyTable').find('tbody').html(html);

				}
			}

		}else{
			$('.readyTable').find('tbody').html(currentHtml);
		}

	});

});