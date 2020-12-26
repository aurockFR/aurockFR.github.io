<?php
	ob_start();
	include 'info.php';
	ob_end_clean();

	if (isset($_POST['bronzeOreAmount'],$_POST['ironOreAmount'],$_POST['goldOreAmount'],$_POST['mithrilOreAmount'],$_POST['adamOreAmount'],$_POST['runiteOreAmount'],$_POST['stygianOreAmount'])){
		$_SESSION['bronzeOreAmount'] = $_POST['bronzeOreAmount'];
		$_SESSION['ironOreAmount'] = $_POST['ironOreAmount'];
		$_SESSION['goldOreAmount'] = $_POST['goldOreAmount'];
		$_SESSION['mithrilOreAmount'] = $_POST['mithrilOreAmount'];
		$_SESSION['adamOreAmount'] = $_POST['adamOreAmount'];
		$_SESSION['runiteOreAmount'] = $_POST['runiteOreAmount'];
		$_SESSION['stygianOreAmount'] = $_POST['stygianOreAmount'];
	}

	function timeFor($t100, $t1, $bar){
		$lvl = $_SESSION['lvl'];
		$haste = $_SESSION['haste'];
		
		$timeDif = $t1-$t100;
		$timePerLvl = $timeDif/89;
		$timeForUserLvl = $timePerLvl*$lvl;
		$timeForUserLvlHaste = $timeForUserLvl-($timeForUserLvl*($haste/100));
		$timeFinal = $timeForUserLvlHaste*$bar;

		return $timeFinal;
	}

	function barFor($amount, $type){
		switch ($type) {
			case 'bronze':
				$bar = $amount/1;
				break;
			case 'iron':
				$bar = $amount/3;
				break;
			case 'gold':
				$bar = $amount/10;
				break;
			case 'mithril':
				$bar = $amount/5;
				break;
			case 'adam':
				$bar = $amount/10;
				break;
			case 'runite':
				$bar = $amount/15;
				break;
			case 'stygian':
				$bar = $amount/25;
				break;
		}

		return $bar;
	}

	function bronzeAmount($amount){
		$bar = barFor($amount, 'bronze');
		$timeForBronze = timeFor(3, 6, $bar);
		echo "Bronze bar amount after smithing: ".floor($bar)."<br>";
		echo "Time to smith all: ".floor($timeForBronze)." secs / ".round(($timeForBronze/60), 2)." mins<br><br>";
		return $timeForBronze;
	};

	function ironAmount($amount){
		$bar = barFor($amount, 'iron');
		$timeForIron = timeFor(6, 12, $bar);
		echo "Iron bar amount after smithing: ".floor($bar)."<br>";
		echo "Time to smith all: ".floor($timeForIron)." secs / ".round(($timeForIron/60), 2)." mins<br><br>";
		return $timeForIron;
	};

	function goldAmount($amount){
		$bar = barFor($amount, 'gold');
		$timeForGold = timeFor(10, 20, $bar);
		echo "Gold bar amount after smithing: ".floor($bar)."<br>";
		echo "Time to smith all: ".floor($timeForGold)."secs  / ".round(($timeForGold/60), 2)." mins<br><br>";
		return $timeForGold;
	};

	function mithrilAmount($amount){
		$bar = barFor($amount, 'mithril');
		$timeForMithril =  timeFor(15, 30, $bar);
		echo "Mithril bar amount after smithing: ".floor($bar)."<br>";
		echo "Time to smith all: ".floor($timeForMithril)." secs / ".round(($timeForMithril/60), 2)." mins<br><br>";
		return $timeForMithril;
	};

	function adamAmount($amount){
		$bar = barFor($amount, 'adam');
		$timeForAdam =  timeFor(22, 44, $bar);
		echo "Adamantite bar amount after smithing: ".floor($bar)."<br>";
		echo "Time to smith all: ".floor($timeForAdam)." secs / ".round(($timeForAdam/60), 2)." mins<br><br>";
		return $timeForAdam;
	};

	function runiteAmount($amount){
		$bar = barFor($amount, 'runite');
		$timeForRunite =  timeFor(45, 90, $bar);
		echo "Runite bar amount after smithing: ".floor($bar)."<br>";
		echo "Time to smith all: ".floor($timeForRunite)." secs / ".round(($timeForRunite/60), 2)." mins<br><br>";
		return $timeForRunite;
	};

	function stygianAmount($amount){
		$bar = barFor($amount, 'stygian');
		$timeForStygian =  timeFor(53, 106, $bar);
		echo "Stygian bar amount after smithing: ".floor($bar)." (require ".(floor($bar)*10)." ichors)"."<br>";
		echo "Time to smith all: ".floor($timeForStygian)." secs / ".round(($timeForStygian/60), 2)." mins<br><br>";
		return $timeForStygian;
	};

	function timeForAll(){
		$timeForAll = bronzeAmount($_SESSION['bronzeOreAmount'])+ironAmount($_SESSION['ironOreAmount'])+goldAmount($_SESSION['goldOreAmount'])+mithrilAmount($_SESSION['mithrilOreAmount'])+adamAmount($_SESSION['adamOreAmount'])+runiteAmount($_SESSION['runiteOreAmount'])+stygianAmount($_SESSION['stygianOreAmount']);
		echo "<br>";
		echo "Time for smithing all ore (in seconds): ".floor($timeForAll)." secs<br>";
		echo "Time for smithing all ore (in minutes): ".round(($timeForAll/60),2)." mins<br>";
		echo "Time for smithing all ore (in hours): ".round((($timeForAll/60)/60),2)." hours<br>";
	}

	function heatForAll(){

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Scapulator</title>
	</head>

	<body>
		<form method="POST" action="Scapulator.php">
			<label for="bronzeOreAmount">Copper/Tin Ore Amount</label>
			<input type="number" name="bronzeOreAmount" value="<?php echo $_SESSION['bronzeOreAmount']?>" id="bronzeOreAmount"><br>

			<label for="ironOreAmount">Iron Ore Amount</label>
			<input type="number" name="ironOreAmount" value="<?php echo $_SESSION['ironOreAmount']?>" id="ironOreAmount"><br>

			<label for="goldOreAmount">Gold Ore Amount</label>
			<input type="number" name="goldOreAmount" value="<?php echo $_SESSION['goldOreAmount']?>" id="goldOreAmount"><br>

			<label for="mithrilOreAmount">Mithril Ore Amount</label>
			<input type="number" name="mithrilOreAmount" value="<?php echo $_SESSION['mithrilOreAmount']?>" id="mithrilOreAmount"><br>

			<label for="adamOreAmount">Adamantite Ore Amount</label>
			<input type="number" name="adamOreAmount" value="<?php echo $_SESSION['adamOreAmount']?>" id="adamOreAmount"><br>

			<label for="runiteOreAmount">Runite Ore Amount</label>
			<input type="number" name="runiteOreAmount" value="<?php echo $_SESSION['runiteOreAmount']?>" id="runiteOreAmount"><br>

			<label for="stygianOreAmount">Stygian Ore Amount</label>
			<input type="number" name="stygianOreAmount" value="<?php echo $_SESSION['stygianOreAmount']?>" id="stygianOreAmount"><br><br>

			<input type="submit" name="calc" value="Let's Calc"><br><br>
		</form>

		<?php
			if (isset($_POST['bronzeOreAmount'],$_POST['ironOreAmount'],$_POST['goldOreAmount'],$_POST['mithrilOreAmount'],$_POST['adamOreAmount'],$_POST['runiteOreAmount'],$_POST['stygianOreAmount'])){
				timeForAll();
				heatForAll();
			}
		?>
	</body>
</html>