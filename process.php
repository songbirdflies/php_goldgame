<?php
session_start();

function get_gold($min, $max)
{
	return rand($min, $max);
}

if (isset($_POST['action']) && $_POST['action'] == 'restart_form')
{
	$_SESSION = array();
	header("Location: index.php"); // restart goes back to index
}

if (!isset($_SESSION['gold_count'])) // if gold count is not set
{
	$_SESSION['gold_count'] = 0; // set gold count to 0
}

if (isset($_POST['building'])) // switch cases 
{
	$building = $_POST['building']; // all buildings
	$gold_count = 0;
	$activity = array();
	$class = "green";


	switch($building)
	{
		case 'flower field':
		$gold_count = get_gold(10, 20);
		break;
		
		case 'unicorn farm':
		$gold_count = get_gold(15, 40);
		break;

		case 'kandi shop':
		$gold_count = get_gold(5, 10);
		break;

		case 'festival':
		$gold_count = get_gold(-100, -400);
		$class = "red";
		break;

		case 'casino':
		$percent = rand(0, 100);

			if ($percent <= 70) 
			{
				$gold_count = get_gold(-50, -1);
				$class = "red";
				$message = "You lose.";
			}
			else 
			{
				$gold_count = get_gold(1, 50);
				$class = "green";
				$message = "You win!";
			}
			
		break;

	}	


	if (isset($_SESSION['activity'])) 
		// store a local copy of the current activity log array
		$activity = $_SESSION['activity'];
	else
		$activity = array();
	
	// Set the current gold count and build the activity log message
	// to be return in the session to index.php
	$_SESSION['gold_count'] += $gold_count;
	$_SESSION['activity'][] = '<span class="' . $class . '"> You went to a ' . $building . ' and earned/loss ' . $gold_count . ' in gold. ' . 
							(($building == 'festival') ? 'You purchased tickets!' : '') . '   (' . date('M d, Y h:ia') . ')</span><br>';
	
	header("Location: index.php");
	exit();
}

?>