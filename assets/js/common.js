$(function() {

	$('.main-menu li').hover(function(){
		$('.main-menu li').removeClass('active');
		$(this).addClass('active');
	}, function() {
		$('.main-menu li').removeClass('active');
		$('.main-menu li[data-active=1]').addClass('active');
	});

	$(document).on('click', '.alphabet li a', function(event) {
		event.preventDefault();
		var aRow = $(document).find('.now .left-hand[data-letter="'+$(this).text()+'"]');
		var heightToScroll = aRow.offset().top - 183;
		if ($(window).width() < 670)
			heightToScroll -=  37;
		if (aRow) {
			$('html, body').animate({
		        scrollTop: heightToScroll
		    }, 2000);
		}
	});

	var data = false;

	if ($('#responce').length) {
		data = JSON.parse($('#responce').html());
	};

	var urlSearch = getUrlParameter('q'),
		searchInp = $('input[name="search"]');

	if (urlSearch && searchInp.length){
		searchInp.val(urlSearch);
		search(urlSearch);
	}

	if (data) {
		animateHeader();
		$(window).scroll(function(event) {
			animateHeader();
		});
		$(document).on('keyup', 'input[name="search"]', function(event) {
			event.preventDefault();
			search($(this).val());
		});
	}

	$(document).on('click', '.menu-toogle', function(event) {
		event.preventDefault();
		$('.main-menu').slideToggle();
	});

	$(document).on('click', '.open-alphabet', function(event) {
		event.preventDefault();
		$('.alphabet').slideToggle();
	});

	
	


	function search(query){
		var	search = query;

		var results = {};

		if (search) {

			history.replaceState('', '', '?q='+search);

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
					 				+'<div class="row-data"><a href="/street/view/id/'+valPlace.id+'">'+oldName+'</a></div>'
					 				+'<div class="row-data">'+newName+'</div>'
					 				+'<div class="row-data">'+ (valPlace.project ? "<span style='color: #eb2a3c;'>Розглядається</span>" : valPlace.resolve_date) +'</div>';

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
			history.replaceState('', '', '/');
			$('.current_table').addClass('now').show();
			$('.search_table').removeClass('now').hide();
		}
	}

	function animateHeader(){
		var windowOffsetTop = $(window).scrollTop();
		var elementOffsetTop = $('.streets-table').offset().top;
		if (windowOffsetTop + 180 > elementOffsetTop) {
			$('header').addClass('fixed animated fadeInDown');
			$('.invisible-height').addClass('active');
		}else{
			$('.invisible-height').removeClass('active');
			$('header').removeClass('fixed animated fadeInDown');
		}

		var els = {};
		$('.left-hand').each(function(index, el) {
			if ($(this).offset().top < $(window).scrollTop() + 185) {
				els[index] = $(this);	
			};
		});
		var e = els[Object.keys(els)[Object.keys(els).length - 1]];
		if (e) 
			if ($('.current-letter').text() != e.text()) {
				$('.current-letter').text(e.text());	
			}
	}

	function getUrlParameter(sParam) {
	    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	        sURLVariables = sPageURL.split('&'),
	        sParameterName,
	        i;

	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');

	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
	    }
	}

});