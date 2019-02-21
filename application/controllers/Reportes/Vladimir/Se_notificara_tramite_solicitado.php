<?php 
    require('fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Image("Logo.jpg",10,8,185,32);

    $pdf->SetFont('Arial','B',10);
    $pdf->ln(35);
    $pdf->cell(105);

    // Información de cabecera parte derecha

    $pdf->Cell(30,5,utf8_decode('OFICIO No.'),0,0,"R");
    $pdf->SetFont('Arial','',10);

    // $pdf->Cell(30,5,utf8_decode('SESP/SE/CGT/241/2018')); Número de oficio
    $pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->cell(100);
    $pdf->Cell(30,5,'ASUNTO:',0,0,"R");
    $pdf->SetFont('Arial','',10);
    // $pdf->Cell(30,5,utf8_decode('Solicitud de documentación')); Es el asunto
    $pdf->Ln();
    $pdf->cell(128);
    // $pdf->Cell(30,5,utf8_decode('trámite de ingreso al RNPSP')); Parte del asunto
    $pdf->Ln();
    $pdf->cell(107);
    // $pdf->Cell(30,5,utf8_decode('Colima, Colima , a 25 de Junio de 2018')); Lugar y fecha
    $pdf->Ln(10);
 

    // Datos del remitente
    $pdf->SetFont('Arial','B',10);

    // $pdf->Cell(30,5,utf8_decode('C. LIC. CARLOS ALBERTO MANCILLA SOTO,'));
    $pdf->Ln();
  
    $pdf->Cell(30,5,utf8_decode('DIRECTOR DEL CENTRO ESTATAL DE EVALUACIÓN Y CONTROL DE CONFIANZA,'));
    $pdf->Ln();
  
    $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
    $pdf->Ln(10);

    // Comunicado
    $pdf->SetFont('Arial','',10);

    //Después de no. viene el número de oficio y la fecha completa.
    //Después de como va el tipo de elememto, como "elemento operativo".
    //Después de en el aplicativo de: va el nombre del .ugar, como el Registro Nacional de Personal de Seguridad Pública
    $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere el numeral 19,20 y además relativos a la ley del Sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no.                                                del año en curso, en el cual se solicita realizar los movimientos de alta, como                      , en el                                           a los elementos que a continuación se enlistan:"));

    // Tabla 

    $pdf->Ln(10);
    $pdf->cell(10);

    // Headers
    $pdf->Cell(40,7,"No.",1);
    $pdf->Cell(40,7,"Nombre",1);
    $pdf->Cell(40,7,"No.",1);
    $pdf->Cell(40,7,"Nombre",1);
    $pdf->Ln();
    // Data
    $pdf->cell(10);
    $pdf->Cell(40,6,1,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,4,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Ln();
    $pdf->cell(10);
    $pdf->Cell(40,6,2,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,5,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Ln();
    $pdf->cell(10);
    $pdf->Cell(40,6,3,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,6,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',10);
    $pdf->cell(12);
    $pdf->SetXY(10,150);
    $pdf->MultiCell(180,5,utf8_decode('Al respecto hago de su conocimiento que se han llevado a cabo los trámites solicitados, adjunto constancias de dichos movimientos.'));
    $pdf->Ln(); 
    $pdf->Cell(30,5,utf8_decode('Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo.'));   

    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->cell(67);
    $pdf->Cell(30,5,utf8_decode('A T E N T A M E N T E'));
    $pdf->Ln();
    $pdf->cell(57);
    $pdf->Cell(30,5,utf8_decode('EL ENCARGADO DEL DESPACHO'));
    $pdf->Ln();
    $pdf->cell(54);
    $pdf->Cell(30,5,utf8_decode('DEL SECRETARIADO EJECUTIVO DEL'));
    $pdf->Ln();
    $pdf->cell(48);
    $pdf->Cell(30,5,utf8_decode('SISTEMA ESTATAL DE SEGURIDAD PÚBLICA'));
    //Nombre del que va a firmar
    // $pdf->Ln(36);
    // $pdf->cell(50);
    // $pdf->Cell(30,5,utf8_decode('ING. HUGO HUMBERTO CHAVEZ DELGADO'));

    $pdf->Ln();

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,5,utf8_decode('C.c.p.'));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',10); //Nombre del CP
    $pdf->Cell(30,5,utf8_decode('C.P'));
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(43);
    $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
    $pdf->Ln();
    $pdf->SetFont('Arial','B',10); //Nombre del sub coordinador
    $pdf->Cell(30,5,utf8_decode('                               '));
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(43);
    $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Igual fin.'));
    $pdf->Ln();
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,5,utf8_decode('ARCHIVO.'));
    $pdf->Ln();
    $pdf->SetFont('Arial','',8); //Código del archivo
    $pdf->Cell(30,5,utf8_decode('                '));

    // $pdf->Ln(5);
    // $pdf->Cell(40);
    // $pdf->SetFont('Arial','',8);
    // $pdf->Cell(30,5,utf8_decode('"Año 2018. Centenario del natalicio del escritor mexicano y universal Juan José Arreola"'));
    $pdf->Ln();

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(55);
    $pdf->Cell(30,5,utf8_decode('Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública'));
    $pdf->Ln();
    $pdf->Cell(45); //Aq
    $pdf->Cell(30,5,utf8_decode(''));
    $pdf->Ln();
    $pdf->Cell(65);
    $pdf->Cell(30,5,utf8_decode('Colima, Colima, México. Tel. (312) 3162603'));
    $pdf->Ln();
    $pdf->Cell(60);
    $pdf->Cell(30,5,utf8_decode('https://www.secretariadoejecutivosesp.col.gob.mx'));

   $pdf->Output();
?>