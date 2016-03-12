<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title><?= $pageTitle ?></title>
		<meta property="fb:app_id" content="1050430195020937" />
		<link rel="icon" type="image/png" href="favicon.ico" />
		<meta property="og:title" content="<?= $pageTitle ?>" />
		<meta property="og:type" content="article">
		<meta property="og:site_name" content="Переіменування вулиць в місті Кіровоград в зв*язку з вимогою закону про декомунізацію" />
		<meta property="og:url" content="<?= $baseUrl ?>" />
		<?= $layoutVars['meta'] ?>	
		<link rel="stylesheet" href="/assets/css/main.min.css" type='text/css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.css">
		<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/less.js/2.6.1/less.js' type='text/javascript'></script>-->
		<script type='text/javascript' src='https://code.jquery.com/jquery-2.2.1.min.js'></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="https://s3.amazonaws.com/assets.freshdesk.com/widget/freshwidget.js "></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-1245735-40', 'auto');
			ga('send', 'pageview');
		</script>
		
	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5&appId=1050430195020937";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		
		<header class='header '>
			<div class="header-border"></div>
			<div class="header-content">
				<div class="top-header">
					<a href="/" class="logo">Rename.kr.ua</a>
					<ul class='main-menu'>
						<li <?= $this->config->route['controllerId'] == 'MainController' ? 'class="active" data-active="1"' : '' ?> >
							<a href="/">Головна</a>
						</li>
						<li <?= $this->config->route['controllerId'] == 'AboutController' ? 'class="active" data-active="1"' : '' ?>>
							<a href="/about">Про проект</a>
						</li>
						<li <?= $this->config->route['controllerId'] == 'DocsController' ?' class="active" data-active="1"' : '' ?>>
							<a href="/docs">Розробникам</a>
						</li>
						<li>
							<a href="#" onclick="FreshWidget.show(); return false;">Зворотній звязок</a>
						</li>
					</ul>
				</div>
				<h1 class='main-title' <?= $this->config->route['controllerId'] != 'MainController' ? 'style="margin-top: 130px;"' : false; ?>>Нові назви вулиць в місті </h1>
				<?php if ($this->config->route['controllerId'] == 'MainController'): ?>
					<div class="search_wrapper">
						<input type="text" name='search' placeholder='Введіть назву'>
					</div>
					<ul class='alphabet'>
						<li><a href="#" >1</a></li>
						<li><a href="#" >2</a></li>
						<li><a href="#" >3</a></li>
						<li><a href="#" >4</a></li>
						<li><a href="#" >5</a></li>
						<li><a href="#" >6</a></li>
						<li><a href="#" >9</a></li>
						<li><a href="#" >А</a></li>
						<li><a href="#" >Б</a></li>
						<li><a href="#" >В</a></li>
						<li><a href="#" >Г</a></li>
						<li><a href="#" >Д</a></li>
						<li><a href="#" >Е</a></li>
						<li><a href="#" >Ж</a></li>
						<li><a href="#" >І</a></li>
						<li><a href="#" >К</a></li>
						<li><a href="#" >Л</a></li>
						<li><a href="#" >М</a></li>
						<li><a href="#" >Н</a></li>
						<li><a href="#" >О</a></li>
						<li><a href="#" >П</a></li>
						<li><a href="#" >Р</a></li>
						<li><a href="#" >С</a></li>
						<li><a href="#" >Т</a></li>
						<li><a href="#" >У</a></li>
						<li><a href="#" >Ф</a></li>
						<li><a href="#" >Ч</a></li>
						<li><a href="#" >Ш</a></li>
						<li><a href="#" >Щ</a></li>
					</ul>
					<div class="header-row">
						<div class="col animated current-letter">1</div>
						<div class="col">Стара назва</div>
						<div class="col">Нова назва</div>
						<div class="col">Дата прийняття</div>
						<div class="col">На честь</div>
		            </div>
				<?php endif ?>
			</div>
		</header>
		
		<div class="invisible-height"></div>

		<div class="content-wrapper">
			<div class="content">
				
				<?= $content ?>

			</div>

			<div class="advertisement">
				<a href="https://www.digitalocean.com/" target='__blank' rel="nofollow">
					<img src="/assets/images/banner.gif" alt="">
				</a>
			</div>

		</div>

		


		<footer class='footer'>
			<div class="footer-content">
				<ul class="footer-menu">
					<li>
						<a href="/">Головна</a>
					</li>
					<li>
						<a href="/about">Про проект</a>
					</li>
					<li>
						<a href="/docs">Розробникам</a>
					</li>
					<li>
						<a href="#" onclick="FreshWidget.show(); return false;">Зворотній звязок</a>
					</li>
				</ul>
				<div class="social">
					<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
					<div class="fb-share-button" data-layout="button_count"></div>
				</div>
			</div>
			<div class="underline"></div>
			<div class="footer-content">
				<div class="copyrything">
					© 2016 Rename. All Rights Reserved.
				</div>
				<div class="development-by">
					<span>Разработано в:</span>
					<a href="https://onix-systems.com" target='__blank'>
						<img src="https://onix-systems.com/img/static/onix-logo.svg" alt="Onix-Systems">
					</a>
				</div>
			</div>
		</footer>

      	<script type="text/javascript"> FreshWidget.init("", {"queryString": "&widgetType=popup&screenshot=no", "widgetType": "popup", "buttonText": "Support", "buttonColor": "white", "buttonBg": "#006063", "backgroundImage": "", "alignment": "4", "offset": "-1500px", "formHeight": "500px", "url": "https://onixsystems.freshdesk.com"} ); </script>
      	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		<script src='/assets/js/common-min.js'></script>
	</body>
</html>