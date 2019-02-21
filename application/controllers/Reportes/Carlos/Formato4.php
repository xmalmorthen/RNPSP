<?php 
    require('PDF/fpdf.php');

  

    
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Image("logo.png",10,8,185,32);

    $pdf->SetFont('Arial','B',10);
    $pdf->ln(35);
    $pdf->cell(105);

    // Información de cabecera parte derecha

    $pdf->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
    $pdf->SetFont('Arial','',10);

    $pdf->Cell(30,5,utf8_decode('SESP/SE/CGT/241/2018'));
    $pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->cell(100);
    $pdf->Cell(30,5,'Asunto:',0,0,"R");
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,5,utf8_decode('Se notifica trámite solicitado.'));
    $pdf->Ln();

    $pdf->cell(107);
    $pdf->Cell(30,5,utf8_decode('Colima, Colima , a 25 de Junio de 2018.'));
    $pdf->Ln(10);
 

    // Datos del remitente
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(30,5,utf8_decode('LIC. ALEJANDRO GUERRERO GUERRERO,'));
    $pdf->Ln();
  
    $pdf->Cell(30,5,utf8_decode('DIRECTOR GENERAL DE LA POLICÍA ESTATAL PREVENTIVA,'));
    $pdf->Ln();
  
    $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
    $pdf->Ln(10);

    // Comunicado
    $pdf->SetFont('Arial','',10);


    $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere el numeral 19, 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no. SSP/DGPEPC/DG/CD/019/2018 de fecha 13 de junio del año en curso, en el cual se solicita realizar los movimientos de alta en el aplicativo del Registro Nacional de Personal de Seguridad Pública (RNPSP), como aspirantes Activos a los elementos que a continuación se enlistan:"));

    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(30,5,utf8_decode('PEP'));

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
    $pdf->SetFont('Arial','',10);
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
  
    
    $pdf->MultiCell(185,5,utf8_decode("Al respecto hago de su conocimiento que se han llevado a cabo los trámites solicitados, adjunto constancias de dichos movimientos."));
    
    $pdf->Ln();
  
    $pdf->MultiCell(185,5,utf8_decode("Es pertinente hacer mención nque la C. MARIA DEL REFUGIO SANCHEZ CORONADO, ya se encuentra registrada en el RNPSP como Aspirante Activo desde el año 2016"));

    
    $pdf->Ln();
  
    $pdf->MultiCell(185,5,utf8_decode("Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo."));


    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',8);
    $pdf->cell(82);
    $pdf->Cell(30,5,utf8_decode('A T E N T A M E N T E'));
    $pdf->Ln();
    $pdf->cell(73);
    $pdf->Cell(30,5,utf8_decode('EL ENCARGADO DEL DESPACHO'));
    $pdf->Ln();
    $pdf->cell(70);
    $pdf->Cell(30,5,utf8_decode('DEL SECRETARIADO EJECUTIVO DEL'));
    $pdf->Ln();
    $pdf->cell(65);
    $pdf->Cell(30,5,utf8_decode('SISTEMA ESTATAL DE SEGURIDAD PÚBLICA'));

    $pdf->Ln(25);
    $pdf->cell(68);
    $pdf->Cell(30,5,utf8_decode('C.P. JOSÉ ALFREDO CHÁVEZ GONZÁLEZ'));

    $pdf->Ln();

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,5,utf8_decode('C.c.p.'));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(30,5,utf8_decode('ING. HUGO HUMBERTO CHÁVEZ DELGADO '));
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(18);
    $pdf->Cell(30,5,utf8_decode('Coordinador General de Administración de Tecnologías del SESESP.- Similar fin.'));
    $pdf->Ln();
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(30,5,utf8_decode('ING- JORGE EDUARDO NAVA TADEO.-.- '));
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(18);
    $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Mismo fin.'));
    $pdf->Ln();
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(30,5,utf8_decode('Archivo.'));
    $pdf->Ln();
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(30,5,utf8_decode('JACHG/HHCHD/NAVA'));

    $pdf->Ln(5);
    $pdf->Cell(52);
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(30,5,utf8_decode('"Año 2018. Centenario del natalicio del escritor mexicano y universal Juan José Arreola"'));
    $pdf->Ln();
    $pdf->Image("Cintillo.png",72,253,65,1);

    $pdf->SetFont('Arial','',6);
    $pdf->Cell(64);
    $pdf->Cell(30,4,utf8_decode('Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública'));
    $pdf->Ln();
    $pdf->Cell(57);
    $pdf->Cell(30,4,utf8_decode('C. Emilio Carranza Esq. Ejército Nacional S/N, Colonia Centro, C.P. 28000'));
    $pdf->Ln();
    $pdf->Cell(72);
    $pdf->Cell(30,4,utf8_decode('Colima, Colima, México. Tel. (312) 3162603'));
    $pdf->Ln();
    $pdf->Cell(69);
    $pdf->Cell(30,4,utf8_decode('https://www.secretariadoejecutivosesp.col.gob.mx'));


   $pdf->Output();




?>