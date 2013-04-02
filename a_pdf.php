<?php
require('fpdf17/fpdf.php');
class PDF extends FPDF
{
//Pie de página
       public function Header(){
       $this -> Image("img/png/glyphicons_130_inbox.png" ,5 , 10 ,20 ,20);
       $this -> SetFont('Arial','B',20);
       $this -> Cell(100,10,"Tabla de Usuarios" ,0 , 0 ,'C' );
       $this -> Ln(20);
       }
       function Footer()
       {
       $this->SetY(-10);
       $this->SetFont('Arial','I',10);
       $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
       }
}
//Creación del objeto de la clase heredada

$cabeceraT = array("Id","Nombre","Usuario","Email","Roles");

$pdf=new PDF();
$pdf->AddPage();
for ($i=0; $i < count($cabeceraT) ; $i++) {
$pdf -> SetFont('Arial' , 'B' , 10);
$pdf -> SetTextColor(300 , 300 , 300);
$pdf -> Cell(30 , 10 , $cabeceraT[$i] , 1 , 0 , 'C' , true);
}
$pdf->SetFont('Times','',12);

$pdf -> Ln(15);

$pdf -> SetTextColor(0 ,0 ,0);
//Aquí escribimos lo que deseamos mostrar
mysql_connect("localhost","root","root");
mysql_select_db("ADSI");
$res = mysql_query("SELECT * FROM usuarios");
while($reg = mysql_fetch_array($res)){
$pdf->Cell(10,5,$reg['id'],1,0,'C');
$pdf->Cell(40,5,$reg['name'],1,0,'C');
$pdf->Cell(40,5,$reg['user'],1,0,'C');
$pdf->Cell(40,5,$reg['email'],1,0,'C');
$pdf->Cell(20,5,$reg['role'],1,0,'C');
$pdf->Ln(); 
}  

$pdf->Output();

?>