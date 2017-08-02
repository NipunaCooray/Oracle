<?php 
// require_once 'phpexcelClasses/PHPExcel.php';
// $excel = new PHPExcel();

// $excel->setActiveSheetIndex(0)
// 	->setCellValue('A1','Hello')
// 	->setCellValue('B1', 'World');

// $file = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
// $file->save('test.xlsx');	


// $file = file("planningData/data.csv");
// $count = count($file);
// // echo $count;
// //echo "<br/>";

// $file = fopen("planningData/data.csv","r");


// for($i=0;$i<=$count;$i++){
  
// 	print_r(fgetcsv($file, 1000, ","));
// 	echo "<br/>";

// }



// fclose($file);

$row = 1;
if (($handle = fopen("planningData/data.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($row == 1){ $row++; continue; }
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}



?>