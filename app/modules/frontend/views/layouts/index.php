<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <title><?= $pageTitle; ?></title>
      <script src='/assets/libs/js/jquery-2.2.0.min.js'></script>
      <!-- Bootstrap core CSS -->
      <link href="/assets/libs/css/bootstrap.min.css" rel="stylesheet">
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <link href="/assets/libs/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="/assets/libs/css/jumbotron-narrow.css" rel="stylesheet">
      <link href="/assets/css/main.css" rel="stylesheet">
      <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
      <!--[if lt IE 9]><script src="../..//assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
      <script src="/assets/libs/js/ie-emulation-modes-warning.js"></script>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-1245735-40', 'auto');
        ga('send', 'pageview');

      </script>
      <script type="text/javascript" src="https://s3.amazonaws.com/assets.freshdesk.com/widget/freshwidget.js "></script>
   </head>
   <body>
      <!-- <div style='    background: url(assets/images/rename-header.jpg) no-repeat center center;background-size: cover;width: 100%;height: 100%;position: fixed;z-index: -1;opacity: 0.1;top: 0;'></div> -->
      <div class="container" style='border-radius: 5px;padding-top: 20px;background: #fff;box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.33);'>
         <div class="header clearfix">
            <nav>
               <ul class="nav nav-pills pull-right">
                  <li role="presentation" class="<?= $this->config->route['controllerId'] == 'MainController' ? 'active' : '' ?>"><a href="/">Головна</a></li>
                  <li role="presentation" class='<?= $this->config->route['controllerId'] == 'AboutController' ? 'active' : '' ?>'><a href="/about">Про проект</a></li>
                  <li role="presentation" class='<?= $this->config->route['controllerId'] == 'DocsController' ? 'active' : '' ?>'><a href="/docs">API</a></li>
               </ul>
            </nav>
            <h3 class="text-muted"><a href="/" style='color: inherit;'>Rename.kr.ua</a></h3>
         </div>
         <!-- <img src="assets/images/rename-header.jpg" width='100%' style='margin-bottom: 20px; border-radius: 5px;' alt=""> -->
      	<?= $content ?>
         <footer class="footer">
            <p>&copy; Onix-Systems 2016 </p>
         </footer>
      </div>
      <!-- /container -->
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <a href="#" onclick="FreshWidget.show(); return false;" class='support'></a>
      <script type="text/javascript"> FreshWidget.init("", {"queryString": "&widgetType=popup&screenshot=no", "widgetType": "popup", "buttonText": "Support", "buttonColor": "white", "buttonBg": "#006063", "backgroundImage": "", "alignment": "4", "offset": "-1500px", "formHeight": "500px", "url": "https://onixsystems.freshdesk.com"} ); </script>
      <script src="/assets/libs/js/ie10-viewport-bug-workaround.js"></script>
      <script src="/assets/js/main.js"></script>
   </body>
</html>