<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ro-RO">
<head profile="http://gmpg.org/xfn/11">
<title>TaglitCRM Error</title>
<meta charset="utf-8"/>
<meta http-equiv="Content-Language" content="ro"/>
<meta name="robots" content="all,index,follow"/>
<meta name="keywords" content="mogoolab, templates, 404 error page"/>
<meta name="description" content="Robotik HTML Error Pages v 1.0 . Developed by MogooLab - www.mogoolab.com"/>
<meta name="publisher" content="mogoolab.com" />
<meta name="author" content="mogoolab.com" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />

<link rel="stylesheet" type="text/css" media="all" href="<?php echo SITE_ROOT?>public/error/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo SITE_ROOT?>public/error/backgrounds.css" />

<link rel="stylesheet" type="text/css" media="all" href="<?php echo SITE_ROOT?>public/error/themes/gray/css/style.css" />


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_ROOT?>public/error/js/jquery-global.js"></script>

<!--[if IE]>
<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body class="dline">


<div class="wrapper">

	<div class="mainWrapper">
        <div class="leftHolder">
        	<a href="http://mogoolab.com" title="Robotik Logo" class="logo">Robotik Logo</a>
            <div class="errorNumber">404</div> 
        </div>
        <div class="rightHolder">
            <div class="message"><p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p></div>
            <div class="robotik"><img src="<?php echo SITE_ROOT?>public/error/images/robotik.png" alt="Oooops....we can’t find that page." title="Oooops....we can’t find that page." id="robot"></div>
            <div class="tryToMessage">
                The error caused by:
                <ul>
                    <?php echo $errorMessage ?>
                </ul>
            </div>
            <!-- Search Form -->
           
            <!-- end .search -->
          </div>
      


        
        <!-- end footer -->

	</div>

</div>
<!-- end .wrapper -->


</body>
</html>