<?php

use Meetschools\Helpers\Utils;

global $session;
global $CI;

$CI->config->load('facebook', TRUE);
$fb_config = $CI->config->item('fb_config', 'facebook');
$fb_appid = $fb_config['appId'];

$page_info = $data['page_info'];

$role = $session->role();
$user = new stdClass();
$user->name = $role->name();
$user->isGuest = $role->is_main_role('guest');
$user->role = $role->main_role();

$data['user'] = $user;


function getCSRFData($ci) {
    $d = new stdClass();
    if (!$ci->config->item('csrf_protection')) {
        return $d;
    }
    $d = new stdClass();
    $d->name = $ci->config->item('csrf_token_name');
    $d->value = $ci->security->get_csrf_hash();
    return $d;
}

$page_info->add_css();
$page_info->add_js('/static/js/includes/common/nprogress.js', '/static/js/includes/common/base.js', '/static/js/includes/jquery.validate.js', '/static/js/includes/jquery-ui.js');

$header_html = $CI->load->view("templates/default/header.php", $data, TRUE);
$footer_html = $CI->load->view("templates/default/footer.php", $data, TRUE);


$content = $CI->load->view($view, $data, TRUE);
$modal = $CI->load->view("templates/default/modal.php", $data, TRUE);

$header = $header_html;
$footer = $footer_html;

if ($view === "home/home") {
    $header = "";
    $footer = $footer_html;
}

//we need to set a var to find what page we are on
//TODO: Set this to a value which can be read in header to decide selected menu
$pageOn = basename($_SERVER['PHP_SELF']);
?>
<!--<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta property="fb:app_id" content="<?= $fb_appid ?>" />
        <meta property="og:type" content="article" />



        <meta name="twitter:site" content="@Internshala" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:creator" content="@internshala" />

      
            <meta property="og:image" content="http://internshala.com/static/images/internshala_for_facebook.png" />
            <meta name="twitter:image:src" content="http://internshala.com/static/images/internshala_for_facebook.png" />
      



        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" /> 
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
                $page_info->execute()
                </head>
                <body>-->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title>Top schools in india - Meetschools</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Ankur Jain">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- Web Fonts -->
<!--        <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>-->

        <!-- CSS Global Compulsory -->
        <link rel="stylesheet" href="/static/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/static/css/style.css">

        <!-- CSS Header and Footer -->
        <link rel="stylesheet" href="/static/css/headers/header-default.css">
        <link rel="stylesheet" href="/static/css/footers/footer-v1.css">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="/static/plugins/animate.css">
        <link rel="stylesheet" href="/static/plugins/line-icons/line-icons.css">
        <link rel="stylesheet" href="/static/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/static/plugins/owl-carousel/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="/static/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
        <link rel="stylesheet" href="/static/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
        <!--[if lt IE 9]><link rel="stylesheet" href="/static/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->



        <!-- CSS Theme -->
        <link rel="stylesheet" href="/static/css/theme-colors/default.css" id="style_color">
        <link rel="stylesheet" href="/static/css/theme-skins/dark.css">

        <!-- CSS Customization -->
        <link rel="stylesheet" href="/static/css/custom.css">






        <!-- JS Global Compulsory -->
        <script type="text/javascript" src="/static/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/static/plugins/jquery/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="/static/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- JS Implementing Plugins -->
        <script type="text/javascript" src="/static/plugins/back-to-top.js"></script>
        <script type="text/javascript" src="/static/plugins/smoothScroll.js"></script>
        <script type="text/javascript" src="/static/plugins/jquery.parallax.js"></script>
        <script type="text/javascript" src="/static/plugins/counter/waypoints.min.js"></script>
        <script type="text/javascript" src="/static/plugins/counter/jquery.counterup.min.js"></script>
        <script type="text/javascript" src="/static/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
        <!-- JS Customization -->
        <script type="text/javascript" src="/static/js/custom.js"></script>
        <!-- JS Page Level -->
        <script type="text/javascript" src="/static/js/app.js"></script>
        <script type="text/javascript" src="/static/js/plugins/owl-carousel.js"></script>
        <script type="text/javascript" src="/static/js/plugins/style-switcher.js"></script>
        <script type="text/javascript" src="/static/js/plugins/nprogress.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                App.initCounter();
                App.initParallaxBg();
                OwlCarousel.initOwlCarousel();
                StyleSwitcher.initStyleSwitcher();
            });
        </script>
    </head>

    <body>

        <div class="wrapper">
            <?php echo $header; ?>
            <!--            <div
                            class="fb-like"
                            data-share="true"
                            data-width="450"
                            data-show-faces="true">
                        </div>-->
            <?php echo $content; ?>

            <?php echo $footer; ?>

        </div><!--/End Wrapepr-->

<!--        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '<?= $fb_appid ?>',
                    xfbml: true,
                    version: 'v2.6'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>-->
        <!--[if lt IE 9]>
            <script src="/static/plugins/respond.js"></script>
            <script src="/static/plugins/html5shiv.js"></script>
            <script src="/static/plugins/placeholder-IE-fixes.js"></script>
        <![endif]-->

    </body>
</html>