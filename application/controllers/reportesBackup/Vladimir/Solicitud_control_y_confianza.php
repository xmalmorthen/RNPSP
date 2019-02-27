<?php 
    require('PDF/fpdf.php');
    $d = new FPDF();
    $d->AddPage();

    $d->Image("logo.png",10,8,185,32);

    $d->SetFont('Arial','B',10);
    $d->ln(35);
    $d->cell(105);

    // Información de cabecera parte derecha

    $d->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
    $d->SetFont('Arial','',10);

    $d->Cell(30,5,utf8_decode('SESP/SE/CGT/241/2018'));
    $d->Ln();
    $d->SetFont('Arial','B',10);
    $d->cell(100);
    $d->Cell(30,5,'Asunto:',0,0,"R");
    $d->SetFont('Arial','',10);
    $d->Cell(30,5,utf8_decode('Solicitud de documentación'));
    $d->Ln();
    $d->cell(128);
    $d->Cell(30,5,utf8_decode('trámite de ingreso al RNPSP'));
    $d->Ln();
    $d->cell(107);
    $d->Cell(30,5,utf8_decode('Colima, Colima , a 25 de Junio de 2018'));
    $d->Ln(10);
 

    // Datos del remitente
    $d->SetFont('Arial','B',10);

    $d->Cell(30,5,utf8_decode('C. LIC. CARLOS ALBERTO MANCILLA SOTO')); //Nombre del director del centro estatal de evaluación
    $d->Ln();
  
    $d->Cell(30,5,utf8_decode('DIRECTOR DEL CENTRO ESTATAL DE EVALUACION Y CONTROL DE CONFIANZA'));
    $d->Ln();

    $d->Cell(30,5,utf8_decode('PRESENTE.'));
    $d->Ln(10);

    // Comunicado
    $d->SetFont('Arial','',10);


    $d->MultiCell(185,5,utf8_decode("Por instrucciones del Encargado del despacho del Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública, el C.P. José Alfredo Chávez González, y con fundamento en el numeral 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima, y con el objetivo de dar cumplimiento al requisito señalado en los artículos 39, apartado B, fracción VIII Y 88, apartado A, fracción VII, apartado B, fracción VI de la LGSNSP, para el ingreso de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP), me permito solicitar la validación que certifique que el personal enlistado posee controles de confianza aprobados y vigentes."));

    $d->Ln(5);
    $d->SetFont('Arial','B',10);
    $d->Cell(5);
    $d->Cell(30,5,utf8_decode('SSP (PERSONAL ADMINISTRATIVO)'));
    $d->Ln(7);
    $d->Cell(5);
    $d->Cell(30,5,utf8_decode('ALTAS'));

    // Tabla 

    $d->Ln(5);
    $d->cell(5);

    // Headers
    $d->Cell(20,7,"CONS.",1);
    $d->Cell(60,7,"Nombre",1);
    $d->Cell(20,7,"CONS",1);
    $d->Cell(60,7,"Nombre",1);
    $d->Ln();

    $d->SetFont('Arial','',10);
    // Data
   
    $d->cell(5);
    $d->Cell(20,6,'',1);
    $d->Cell(60,6,"",1);
    $d->Cell(20,6,"",1);
    $d->Cell(60,6,'',1);
    $d->Ln(10);
    $d->SetFont('Arial','',10);
    $d->cell(12);


    $d->SetFont('Arial','B',10);
    $d->Ln(7);
    $d->Cell(5);
    $d->Cell(30,5,utf8_decode('Actualización de puestos'));
    // Tabla 
    $d->Ln(5);
    $d->cell(5);

    // Headers
    $d->Cell(20,7,"CONS.",1);
    $d->Cell(60,7,"Nombre",1);
    $d->Cell(20,7,"CONS",1);
    $d->Cell(60,7,"Nombre",1);
    $d->Ln();

    $d->SetFont('Arial','',10);
    // Data
   
    $d->cell(5);
    $d->Cell(20,6,'',1);
    $d->Cell(60,6,"",1);
    $d->Cell(20,6,"",1);
    $d->Cell(60,6,'',1);
    $d->Ln(10);
    $d->SetFont('Arial','',10);
    $d->cell(12);
    $d->Cell(30,5,utf8_decode('Sin otro particular hago propicia la ocasión para hacerle llegar un cordial saludo'));


    $d->Ln(9);
    $d->SetFont('Arial','B',8);
    $d->cell(82);
    $d->Cell(30,5,utf8_decode('A T E N T A M E N T E'));
    $d->Ln();
    $d->cell(76);
    $d->Cell(30,5,utf8_decode('EL COORDINADOR GENERAL'));
    $d->Ln();
    $d->cell(78);
    $d->Cell(30,5,utf8_decode('DE ADMINISTRACIÓN DE'));
    $d->Ln();
    $d->cell(76);
    $d->Cell(30,5,utf8_decode('TECNOLOGÍAS DEL SESESP'));

    $d->Ln(13);
    $d->cell(68);
    $d->Cell(30,5,utf8_decode('ING. HUGO HUMBERTO CHAVEZ DELGADO'));

    $d->Ln();

    $d->SetFont('Arial','',8);
    $d->Cell(30,5,utf8_decode('C.c.p.'));
    $d->Ln(9);
    $d->SetFont('Arial','B',6);
    $d->Cell(30,5,utf8_decode('C.P JOSÉ ALFREDO CÁVEZ GONZÁLEZ.-.- '));
    $d->SetFont('Arial','',6);
    $d->Cell(18);
    $d->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
    $d->Ln();
    $d->SetFont('Arial','B',6);
    $d->Cell(30,5,utf8_decode('ING- JORGE EDUARDO NAVA TADEO.-.- '));
    $d->SetFont('Arial','',6);
    $d->Cell(18);
    $d->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Igual fin.'));
    $d->Ln();
    $d->SetFont('Arial','',6);
    $d->Cell(30,5,utf8_decode('Archivo.'));
    $d->Ln();
    $d->SetFont('Arial','',6);
    $d->Cell(30,5,utf8_decode('JACHG/HHCHD/NAVA'));

    $d->Ln(4);
    $d->Cell(52);
    $d->SetFont('Arial','',6);
    $d->Cell(30,5,utf8_decode('"Año 2018. Centenario del natalicio del escritor mexicano y universal Juan José Arreola"'));
    $d->Ln();
    $d->Image("Cintillo.png",72,258,65,1);
    $d->SetFont('Arial','',6);
    $d->Cell(64);
    $d->Cell(30,4,utf8_decode('Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública'));
    $d->Ln();
    $d->Cell(57);
    $d->Cell(30,4,utf8_decode('C. Emilio Carranza Esq. Ejército Nacional S/N, Colonia Centro, C.P. 28000'));
    $d->Ln();
    $d->Cell(72);
    $d->Cell(30,4,utf8_decode('Colima, Colima, México. Tel. (312) 3162603'));
    $d->Ln();
    $d->Cell(69);
    $d->Cell(30,4,utf8_decode('https://www.secretariadoejecutivosesp.col.gob.mx'));


   $d->Output();





?>