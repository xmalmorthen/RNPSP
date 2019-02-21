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
    $pdf->Cell(30,5,utf8_decode('Solicitud de documentación'));
    $pdf->Ln();
    $pdf->cell(128);
    $pdf->Cell(30,5,utf8_decode('trámite de ingreso al RNPSP'));
    $pdf->Ln();
    $pdf->cell(107);
    $pdf->Cell(30,5,utf8_decode('Colima, Colima , a 25 de Junio de 2018'));
    $pdf->Ln(10);
 

    // Datos del remitente
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(30,5,utf8_decode('LIC. ALEJANDRO GUERRERO GUERRERO,'));
    $pdf->Ln();
  
    $pdf->Cell(30,5,utf8_decode('DIRECTOR DEL INSTITUTO DE FORMACIÓN'));
    $pdf->Ln();
  
    
    $pdf->Cell(30,5,utf8_decode('CAPACITACIÓN Y PROFESIONALIZACIÓN POLICIAL,'));
    $pdf->Ln();

    $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
    $pdf->Ln(10);

    // Comunicado
    $pdf->SetFont('Arial','',10);


    $pdf->MultiCell(185,5,utf8_decode("Por instrucciones del Encargado del despacho del Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública, el C.P. José Alfredo Chávez González, y con fundamento en el numeral 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima, y con el objetivo de dar cumplimiento al requisito señalado en los artículos 39, apartado B, fracción VIII Y 88 apartado A, fracción VII, apartado B, fracción VI de la LGSNSP, para el ingreso de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP), me permito solicitar la validación que certifique que el personal enlistado haya aprobado el curso de formación inicial."));

    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(30,5,utf8_decode('PEP'));

    // Tabla 

    $pdf->Ln(10);
    $pdf->cell(10);

    // Headers
    $pdf->Cell(40,7,"No.",1);
    $pdf->Cell(40,7,"Nombre",1);
    $pdf->Cell(40,7,"Perfil",1);
    $pdf->Cell(40,7,"Dependencia",1);
    $pdf->Ln();
    // Data
    $pdf->SetFont('Arial','',10);
    $pdf->cell(10);
    $pdf->Cell(40,6,1,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,"",1);
    $pdf->Ln();
    $pdf->cell(10);
    $pdf->Cell(40,6,2,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,"",1);
    $pdf->Ln();
    $pdf->cell(10);
    $pdf->Cell(40,6,3,1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,"",1);
    $pdf->Cell(40,6,"",1);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',10);
    $pdf->cell(12);
    $pdf->Cell(30,5,utf8_decode('Sin otro particular hago propicia la ocasión para hacerle llegar un cordial saludo'));
    // NUEVO CÓDIGO
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',8);
    $pdf->cell(82);
    $pdf->Cell(30,5,utf8_decode('A T E N T A M E N T E'));
    $pdf->Ln();
    $pdf->cell(76);
    $pdf->Cell(30,5,utf8_decode('EL COORDINADOR GENERAL'));
    $pdf->Ln();
    $pdf->cell(78);
    $pdf->Cell(30,5,utf8_decode('DE ADMINISTRACIÓN DE'));
    $pdf->Ln();
    $pdf->cell(76);
    $pdf->Cell(30,5,utf8_decode('TECNOLOGÍAS DEL SESESP'));

    $pdf->Ln(25);
    $pdf->cell(68);
    $pdf->Cell(30,5,utf8_decode('ING. HUGO HUMBERTO CHAVEZ DELGADO'));

    $pdf->Ln();

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,5,utf8_decode('C.c.p.'));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(30,5,utf8_decode('C.P JOSÉ ALFREDO CÁVEZ GONZÁLEZ.-.- '));
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(18);
    $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
    $pdf->Ln();
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(30,5,utf8_decode('ING- JORGE EDUARDO NAVA TADEO.-.- '));
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(18);
    $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Igual fin.'));
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
    $pdf->Image("Cintillo.png",72,258,65,1);

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