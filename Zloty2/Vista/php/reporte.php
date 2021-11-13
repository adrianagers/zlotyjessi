<?php
    require_once "../Modelo/mantenerSesion.php";
    require('../fpdf/fpdf.php');
    class MyFPDF extends FPDF
    {
        function Header()
        {
        
        $this->SetFont("Arial", "B", 10);        
        $this->Cell(60);
        $this->setTextColor(200,40,40);
        $this->Cell(70, 10, "Productos donados por: ".$_SESSION['nombre'], 1, 1, "C");
        $this->Ln(20);
        $this->setTextColor(20,20,255);
        $this->Cell(20,10,'Id',1,0,'C',0);
        $this->Cell(30,10,'Nombre',1,0,'C',0);
        $this->Cell(50,10,'Descripcion',1,0,'C',0);
        $this->Cell(30,10,'Existencias',1,0,'C',0);
        $this->Cell(30,10,'Categoria',1,0,'C',0);
        $this->Cell(30,10,'Estado',1,1,'C',0);
        }
        function Footer()
        {
        $this->setTextColor(120,120,155);
        $this->SetY(-10);       
        $this->SetFont("Arial", "I", 8); 
        $this->Cell(25,8,utf8_decode("Fecha creación "),0,0,'L');
        $this->Cell(0,8,date('d/m/Y'),0,0,'L');
        $this->Cell(0, 10, utf8_decode("Página ") . $this->PageNo() . "/{nb}", 0, 0, "C");
        }
    }
    $pdf = new myFPDF();
    $pdf->AddPage();
    $pdf->SetFont('Times','',10);
    $pdf->setTextColor(80,120,105);
    foreach ($matrizproducto as $row) {
        $pdf->Cell(20,10,$row['idProducto'],1,0,'C',0);
        $pdf->Cell(30,10,$row['nombreProducto'],1,0,'C',0);
        $pdf->Cell(50,10,$row['descripcionProducto'],1,0,'C',0);
        $pdf->Cell(30,10,$row['Existencias'],1,0,'C',0);
        $pdf->Cell(30,10,$row['idCategoria'],1,0,'C',0);
        $pdf->Cell(30,10,$row['idEstado'],1,1,'C',0);
        
    }
    
    $pdf->Output();
    
?>