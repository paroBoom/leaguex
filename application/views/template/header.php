<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
                
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>

         <!-- Required fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,500,600" rel="stylesheet">
        
        <!-- Page title is dynamically set in the controllers -->
        <title><?php echo $page_title; ?></title>
        
        <!-- Required CSS/JS -->
        <?php echo put_headers();?>

        <!-- Set global base url -->
        <script>var site_url = '<?php echo site_url() ?>';</script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->        
    </head>

    <body <?php if(($page_view == 'signin') || ($page_view == 'signup') || ($page_view == 'recovery')) {echo 'style="background-color:#ef4437"';} ?>>

        <!-- Page loader -->
        <div class="page-loader">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-page">
                        <div class="circle-wrap left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-wrap right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (is_logged_in()) { echo '<div class="main-wrapper">'; } ?>

    