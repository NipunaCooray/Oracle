<html> 
<head>
	

</head>	

<body>



<?php 
	include("connect.php"); 	

	$link=Connection();

	$ongoingStyleQuery = "SELECT styledata.styleNumber,styledata.areaList FROM `styledata` WHERE styledata.styleNumber IN (SELECT DISTINCT styleNumber FROM `planningdata` WHere planningdata.orderState='ongoing') ";

	$ongoingStyleResult = mysqli_query($link,$ongoingStyleQuery) or die(mysqli_error($link));

	while($row = mysqli_fetch_array($ongoingStyleResult)) {

		

		$styleNumber = $row['styleNumber'];
		$areaList = $row['areaList'];
		
		echo "<b>".$styleNumber."</b>";

		$areaArray = explode(",",$areaList);

		// print_r($areaArray);
		// echo "<br>";


		//Need to get the machine number and areas of each active style

		$getDefectsQuery = "SELECT id,machineNo";

		foreach ($areaArray as $area) {
		    $getDefectsQuery = $getDefectsQuery.",".$area;
		}

		$getDefectsQuery = $getDefectsQuery." FROM ".$styleNumber." WHERE status='Rework' OR status='Reject' ORDER BY id DESC LIMIT 5";
		//echo $getDefectsQuery."<br>";

		$getDefectsResult = mysqli_query($link,$getDefectsQuery) or die(mysqli_error($link));

		$defects = array();

		echo '<div "> ';



		echo '<table class="table table-bordered table-responsive "> ';
		echo '<thead> <tr>
		<th class="col-md-1">Piece ID</th>
		<th class="col-md-1">Machine number</th>
		<th class="col-md-1">Common defect</th>
		

		</tr> </thead>';



		while($row = mysqli_fetch_row($getDefectsResult)) {
			$id = $row[0];
			$machineNumber = $row[1];

			// echo $id."<br>";
			// echo $machineNumber."<br>";
			
			foreach ($row as $key => $value) {
				if($key==0 or $key==1){
					continue;
				}else{
					//echo $row[$key]."<br>";
					$currentDefects = explode(",",$row[$key]);

					//print_r($currentDefects);

					$defects = array_merge($defects, $currentDefects);

				}
				
			}

			// echo "<br> All occurred defects :";
			// print_r($defects);
			//echo "<br>";

			$values = array_count_values($defects);
			arsort($values);
			$popular = array_slice(array_keys($values), 0, 1, true);

			$commonDefectID =  $popular[0];

			$getCommonDefectNameQuery = "SELECT defecttypes.defecttype FROM defecttypes WHERE defecttypes.defecttypeid='".$commonDefectID." ' ";
			$getCommonDefectNameResult = mysqli_query($link,$getCommonDefectNameQuery) or die(mysqli_error($link));

			// $data = array();

			

			while($row = mysqli_fetch_array($getCommonDefectNameResult)) {
				$defectName = $row['defecttype'];
				//array_push($data,array('styleID'=>$id, 'machineNumber'=>$machineNumber, 'commonDefect'=>$defectName));

				echo "<tr>";
				echo "<td >" . $id . "</td>";
				echo "<td>" . $machineNumber . "</td>";
				echo '<td class="alert alert-danger"><b>' . $defectName . '</b></td>';
				
				echo "</tr>";
			}
	
		}

		echo "</table>";

		echo '</div> ';


	}	


?>	


</body>

</html>

