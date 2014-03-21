<!DOCTYPE html>
<?php
	require_once dirname(__FILE__) . '/config/config.php';
	require_once dirname(__FILE__) . '/helpers/CurlHelper.php';
	require_once dirname(__FILE__) . '/classes/TagFeed.php';
	$feed = new TagFeed($config['client_id'],'barcelona',6);
	$response = $feed->response();

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tag Feed for #<?php echo $feed->tag ;?></title>
    
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="row">
    <h1>Showing <?php echo $feed->count ;?> of <?php echo $feed->mediaCount(); ?> Items recently tagged #<?php echo $feed->tag ;?></h1>
    <?php if(isset($response->data)) { ?>
    	<?php foreach($response->data as $key=>$row) {?>
    	<div>
    		<a href="<?php echo $row->link ;?>embed/"><img src="<?php echo $row->images->low_resolution->url;?>" width="<?php echo $row->images->low_resolution->width;?>" height="<?php echo $row->images->low_resolution->height;?>" alt="<?php if(isset($row->caption->text)){ echo $row->caption->text;};?>" /></a><br>
    		<p><a href="//instagram.com/<?php if(isset($row->user->username)){echo $row->user->username;}?>"><?php if(isset($row->user->username)){echo $row->user->username;}?></a></p>
    	</div>
    	<?php } ?>
    <?php } ?>
	</div>
</body>
</html>