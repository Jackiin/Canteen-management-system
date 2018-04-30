<?php
require($_SERVER['DOCUMENT_ROOT'].'/fpdf.php');
session_start();

class PDF extends FPDF {
	
	function Header() {
		// Logo
		$this -> Image($_SERVER['DOCUMENT_ROOT'].'/image/ap.png',85,6,30);
		$this -> SetFont('Times','B',16);
		$this -> Cell(80);
		$this -> Ln(20);
	}
	
	function Content() {
		date_default_timezone_set('Asia/Hong_Kong');
		$date = date('Y-m-d H:i:s');
		$this -> Cell(40,10,"Order: ".$_SESSION['order_id']);
		$this -> Ln(10);
		$this -> Cell(40,10,"Time: ".$date);
		$this -> Ln(20);
		
		$header = array('Food', 'Unit Price', 'quantity', 'total');
		$data = array();
		$data[0] = array();
		$data[1] = array();
		$data[2] = array();
		$data[3] = array();
		for($i=0; $i<count($header); $i++) {
			$data[$i][0] = $_SESSION['names'][$i];
			$data[$i][1] = $_SESSION['unitprices'][$i];
			$data[$i][2] = $_SESSION['quantities'][$i];
			$data[$i][3] = $_SESSION['prices'][$i];
		}
		$this -> Table($header, $data);
	}
	
	function Table($header, $data) {
		// Colors, line width and bold font
		$this -> SetFillColor(102,102,102);
		$this -> SetTextColor(250, 250, 250);
		$this -> SetDrawColor(255,255,255);
		$this -> SetLineWidth(.2);
		$this -> SetFont('','B');
		// Header
		$w = array(80, 35, 35, 35);
		for($i=0; $i<count($header); $i++) {
			$this -> Cell($w[$i],7,$header[$i],1,0,'C',true);
		}
		$this -> Ln();
		// Color and font restoration
		$this -> SetFillColor(243,243,243);
		$this -> SetTextColor(10, 10, 10);
		$this -> SetFont('');
		// Data
		$fill = false;
		foreach($data as $row) {
			if ($row[2] != 0) {
				$this -> Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				$this -> Cell($w[1],6,number_format($row[1]),'LR',0,'C',$fill);
				$this -> Cell($w[2],6,number_format($row[2]),'LR',0,'C',$fill);
				$this -> Cell($w[3],6,number_format($row[3]),'LR',0,'C',$fill);
				$this -> Ln(10);	
			} else {
				
			}
		}
		// Closing line
		$this -> Cell(array_sum($w),0,'','T');
		
		$p = $_SESSION['prices'];
		$this -> SetFont('Times','B',24);
		$this -> SetXY(140,$this -> GetY() + 10);
		$this -> Cell(40,10,"Total:   ".($p[0]+$p[1]+$p[2]+$p[3]),0,'','L');
	}

}

$pdf = new PDF();
$pdf->SetFont('Times','',14);
$pdf->Addpage('P','A4');
$pdf->Content();
$pdf->Output();
?>
