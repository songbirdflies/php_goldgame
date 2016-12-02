<?php session_start(); ?>
<head>
	<meta charset="UTF-8">
	<title>Raver Gold Game</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
		<div class="goldbars">
			<img src="images/gold_bar.png" align="left" width="50" alt="">
			<span>Your Gold</span>
			<input type="text" name="your-gold" value="<?php echo isset($_SESSION['gold_count']) ? $_SESSION['gold_count'] : '' ?>" disabled>
		</div>
		<div class="restart">
			<form id="restart-form" action="process.php" method="post">
				<input type="hidden" name="action" value="restart_form" />
				<input type="submit" value="Start Over">
			</form>
		</div>
		<div class="clear"></div>
		<div class="building">
			<h3>Flower Fields</h3>
			<img src="images/flowerfield.jpg" width="200" alt="">
			<p>(earns 10-20 golds)</p>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="flower field" />
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>

		<div class="building">
			<h3>Unicorn Glitter Farm</h3>
			<img src="images/cute_unicorn.png" width="180" alt="">
			<p>(earns 15-40 golds)</p>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="unicorn farm" />
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>

		<div class="building">
			<h3>Kandi Shop</h3>
			<img src="images/owl_kandi.jpg" width="200" alt="">
			<p>(earns 5-10 golds)</p>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="kandi shop" />
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>

		<div class="building">
			<h3>Casino</h3>
			<img src="images/casino.jpg" width="200" alt="">
			<p>(win/lose 0-50 golds)</p>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="casino" />
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>

		<div class="edm">
			<h3>EDM Festival</h3>
			<img src="images/edm_festival.jpg" width="400" alt="">
			<p>(lose 100-400 gold)</p>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="festival" />
				<input type="submit" value="Purchase Tickets!"/>
			</form>
		</div>

		<div class="log">
			<h2>Activities:</h2>
			<div id="log"><?php echo isset($_SESSION['activity']) ? implode('', array_reverse($_SESSION['activity'])) : ''; ?></div>
		</div>	
		</div>
	</div>
</body>
</html>