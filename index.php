<?php
	ob_start();
	session_start();
	include 'config.php';
	include 'log/functions.php';
	if(empty($username)){
        session_destroy();
    }
    #====================
	if(strpos($_SERVER['QUERY_STRING'], '=')){
	    $pattern = '#=(.*)#';
	    $str = $_SERVER['QUERY_STRING'];
	    preg_match($pattern, $str, $matches);
	    if(strpos($matches[1], '%27')  === false){
	    }else{
	        echo "<script>alert('BUG CMM =))');window.location= 'https://www.facebook.com/4';</script>";
	    }
	}
	$hour = date("G");
	 function ham_chuyen_doi($so_giay){  
                    $dt1 = new DateTime("@0");  
                    $dt2 = new DateTime("@$so_giay");  
                    return $dt1->diff($dt2)->format('%a ngày, %h giờ');  
     }  
    ?>
<?php include_once('main/head.php'); ?>
<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
<!-- Start wrapper-->
 <div id="wrapper" class="wrapper">
        <?php include_once('main/core/navbar.php'); ?>
        <?php include_once('main/core/sidebar_menu.php'); ?>
		<?php include_once('main/core/main_content.php'); ?>
</div>
<!--<style type="text/css"> {cursor: url(<?= $domain ?>/theme/cursor/Normal.cur), auto !important;}</style>-->
<style type="text/css">
* {
cursor: url(https://cur.cursors-4u.net/smilies/smi-3/smi266.ani), 
url(http://cur.cursors-4u.net/smilies/smi-3/smi266.png), 
auto !important;
}
</style>
</body>
</html>