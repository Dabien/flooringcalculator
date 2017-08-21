<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Flooring Calculator</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style type="text/css">
	.flooring-calculator {
		padding:10px;
		border: 5px solid #0092db;
		border-radius:20px;
		height:auto;
		width:350px;
		font-family: 'Roboto', sans-serif;
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>

	<?php
	$width = "0";
	$length = "0";
	$measurement = "";
	$packs = 0;
	$squarefoot = 0;



	if (!empty($_POST)) {
		$width = $_POST['width'];
		$length = $_POST['length'];
		$measurement = $_POST['measurement'];
		//$packs = ceil($width / 2.1) * ceil($length / 2.1);
		$squarefoot = $width * $length;
	if ($_POST['measurement'] == 'metre') {$measure = 2.1;} else if ($_POST['measurement'] == 'feet') {$measure = 6.89;}
		$packs = ceil($squarefoot / $measure);
	}

//$packs = $squarefoot / 2.1;


	?>



	<div class="flooring-calculator">
		<h2>How much flooring do I need?</h2>
		<form class="autoSubmit" action="index.php" method="POST">
			<p><input onchange="this.form.submit()" placeholder="Width" value="<?php echo $width;?>" name="width" id="width" type="text" value=""><label>Width</label></p>

			<p><input onchange="this.form.submit()" placeholder="Length" value="<?php echo $length;?>" name="length" id="length" type="text" value=""><label>Length</label></p>
			<input onchange="this.form.submit()" type="radio" name="measurement" <?php if($measurement != "feet"){ echo "checked ";}?>value="metre">
			<label>Metres</label>

			<input onchange="this.form.submit()" type="radio" name="measurement" <?php if($measurement == "feet"){ echo "checked ";}?>value="feet">
			<label>Feet</label>

		</form>

		<br>
<?php if(!empty($_POST['width'])){if(!empty($_POST['length'])){?>
		<p class="packs">You require <strong> <span><?php echo ceil($packs);?></span> pack(s)</strong> giving you a total coverage of <span><?php echo $squarefoot;?></span> <span>sq/<?php if (!empty($_POST)) {echo $_POST['measurement'];}?></span> @ <span class="sq-m">£35.00 per <?php echo $measure;?>sq/<?php if (!empty($_POST)) {echo $_POST['measurement'];}?> pack</span></p>


		<b>Cost for your total area is :</b> <strong>£<span class="calc-total"><?php echo ceil($packs) * 35;?></span></strong>
<?php }} ?>
	</div>






</body>
</html>
