<!doctype html>
<html lang="en">
<head>
    <?php include 'const.php'; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle;?></title>
    <meta name="description" content="<?php echo $metaDesc ; ?>">
    <meta name="keywords" content="<?php echo $metaKey ; ?>">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">
    <?php if($filename1 !='index' ) { $strCanonicalUrl='https://' .$_SERVER[ 'HTTP_HOST'].$_SERVER[ 'REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $strCanonicalUrl; ?>" />
    <?php } ?>
	<link href="https://fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i&display=swap" rel="stylesheet"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owlcarousel CSS -->
    <link rel="stylesheet" href="assets/owlcarousel/owl.carousel.min.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="assets/fancybox/fancybox.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Mediaquery CSS -->
    <link rel="stylesheet" href="css/media-query.css">
</head>
<body class="<?php echo $filename1; ?>">
<header>
	<!--top_bar Start-->
    <div class="top_bar">
        <div class="container">
            <div class="contact_details">
                <div class="address-box d-none d-sm-block">
                    <p class="address">London Road, Billericay, Essex, CM12 9HP</p>
                </div>
				<div class="mail d-none d-sm-block">
					<a class="email" href="mailto:info@johnaprobert.co.uk">info@johnaprobert.co.uk</a>
				</div>
				<ul class="john-num d-block d-sm-none">
					<li><span>John Mobile</span> <a href="tel:07973552647">07973 552 647</a></li>
				</ul>
            </div>
        </div>
    </div><!--top_bar end-->
	<!--middle_bar Start-->
	<div class="middle_bar">
		<div class="container">
			<div class="logo">
				<a href="index.php">
					<img src="images/John-A-Probert-Sons-&-Grandsons.png" alt="John-A-Probert-Sons-&-Grandsons" />
				</a>		
			</div>
			<div class="contact-numbers">
				<ul class="top-num">
					<li><a href="tel:01277657904">01277 657 904</a></li>
					<li><a href="tel:01277636377">01277 636 377</a></li>
				</ul>
				<ul class="john-num">
					<li><span>John Mobile</span> <a href="tel:07973552647">07973 552 647</a></li>
				</ul>
			</div>
		</div>
	</div><!--middle_bar end-->
	<!-- Navigation Start -->
	<div class="menu_wrap">
		<div class="container">        
            <nav>
                <ul class="menu">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="turf.php">Turf</a></li>
                    <li class="">
                        <a href="aggregates.php">Aggregates</a>
                        <?php /*?><ul>
                            <li><a href="top-soil.php">Top Soil</a></li>
                            <li><a href="decorative-stone.php">Decorative stone</a>
                        </ul><?php */?>
                    </li>
                    <li><a href="stone-paving.php">Stone Paving</a></li>
                    <li><a href="sleepers.php">Sleepers</a></li>
                    <li><a href="areas-we-deliver-to.php">Areas we deliver to</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="toggle" onclick="myFunction(this)">
                <span>Menu</span>
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </div>
</header><!-- Navigation End -->