$(function() {
	


	$('.main-menu li').hover(function(){
		$('.main-menu li').removeClass('active');
		$(this).addClass('active');
	}, function() {
		$('.main-menu li').removeClass('active');
		$('.main-menu li[data-active=1]').addClass('active');
	});

	$(document).on('click', '.alphabet li a', function(event) {
		console.log(123);
		event.preventDefault();
		var aRow = $(document).find('.now .left-hand[data-letter="'+$(this).text()+'"]');
		if (aRow) {
			$('html, body').animate({
		        scrollTop: aRow.offset().top
		    }, 2000);
		}
	});

	var data = false;

	if ($('#responce').length) {
		data = JSON.parse($('#responce').html());
	};

	console.log(data);

	if (data) {
		$(document).on('keyup', 'input[name="search"]', function(event) {
			event.preventDefault();

			var	search = $(this).val();

			var results = {};

			if (search) {

				$.each(data, function(indexletter, valLetter) {
					 $.each(valLetter, function(indexPlace, valPlace) {
					 	
					 	if (valPlace.old_name && valPlace.new_name) {

	 						var oldNameLooking = valPlace.old_name.toLowerCase().indexOf(search.toLowerCase()) >= 0,
						 		newNameLooking = valPlace.new_name.toLowerCase().indexOf(search.toLowerCase()) >= 0

						 	 if (oldNameLooking || newNameLooking) {

								if ($.isEmptyObject(results[indexletter])) 
									results[indexletter] = [];

								results[indexletter].push(valPlace);

							}
					 	};

					 });
				});


				if (results) {

					html = '';

					$.each(results, function(indexLetter, valLetter) {
						html += '<div class="table-row"><div class="left-hand" data-letter="'+indexLetter+'">'+indexLetter+'</div><div class="rigth-hand">';
						if (valLetter) {
							$.each(valLetter, function(indexPlace, valPlace) {
								var newName = valPlace.new_name, oldName = valPlace.old_name;
						 		var startToIndexReplaceNew = newName.toLowerCase().indexOf(search.toLowerCase()), startToIndexReplaceOld = oldName.toLowerCase().indexOf(search.toLowerCase());
						 		if (startToIndexReplaceNew >= 0)
						 			newName = newName.replace( new RegExp(newName.substr(startToIndexReplaceNew, search.length), 'i'), '<b>'+newName.substr(startToIndexReplaceNew, search.length)+'</b>');
						 		if (startToIndexReplaceOld >= 0)
						 			oldName = oldName.replace( new RegExp( oldName.substr(startToIndexReplaceOld, search.length), 'i'), '<b>'+oldName.substr(startToIndexReplaceOld, search.length)+'</b>');

						 		html += '<div class="row">'
						 				+'<div class="row-data"><a href="/street/view/id/'+valPlace.id+'">'+oldName+'<a></div>'
						 				+'<div class="row-data">'+newName+'</div>'
						 				+'<div class="row-data">'+valPlace.date_and_number_of_resolve+'</div>';

						 		var eponimRes = '';
						 		if (valPlace.eponim) {
						 			$.each(['', 'Особа', 'Об’єкт', 'Історична назва', 'Суб’єкт'], function(key, value) {
										if (valPlace.eponim_type == key) 
											eponimRes = (valPlace.eponim && valPlace.eponim != 'історична назва') ? '<a href="'+valPlace.eponim+'" target="__blank">'+value+'</a>' : value;
						 			});
						 		}
						 		html += '<div class="row-data">'+eponimRes+'</div>';

						 		html +='</div>'
							});
						}
						html += '</div></div>'
					});

					if (html) {
						$('.current_table').removeClass('now').hide();
						$('.search_table').addClass('now').show().html(html);
					}
				}

			}else{
				$('.current_table').addClass('now').show();
				$('.search_table').removeClass('now').hide();
			}

		});

	}

});
(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
 }})();