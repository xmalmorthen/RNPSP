<?php 
    require('PDF/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Image("logo.png",10,8,185,32);

    $pdf->SetFont('Arial','B',10);
    $pdf->ln(35);
    $pdf->cell(105);

    // Información de cabecera parte derecha

    $pdf->Cell(30,5,utf8_decode('OFICIO No.'),0,0,"R");
    $pdf->SetFont('Arial','',10);

    $pdf->Cell(30,5,utf8_decode(''));
    $pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->cell(100);
    $pdf->Cell(30,5,'ASUNTO:',0,0,"R");
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,5,utf8_decode(''));
    $pdf->Ln();
    // $pdf->cell(107);
    // $pdf->Cell(30,5,utf8_decode('Colima, Colima , a 25 de Junio de 2018'));
    //Fecha generada automaticamente
    $pdf->Ln(10);
 
    // Datos del remitente
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(30,5,utf8_decode('COORDINADOR ADMINISTRATIVO'));
    $pdf->Ln();
  
    $pdf->Cell(30,5,utf8_decode('SECRETARÍA DE SEGURIDAD PÚBLICA'));
    $pdf->Ln();
  
    $pdf->Cell(30,5,utf8_decode('P R E S E N T E.'));
    $pdf->Ln(10);

    // Comunicado
    $pdf->SetFont('Arial','',10);

    //Despues de oficio no. va el numero de oficio y la fecha del año en curso
    //Despues de (RNPSP), Se escribe dependiendo del sexo "del ciudadano o de la ciudadana",
    $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere el numeral 19, 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no.                                               del año en curso, signado por el Director General de Operaciones e Inteligencia, en el cual se solicita realizar el trámite de baja en el aplicativo del Registro Nacional de Personal de Seguridad Pública (RNPSP),                                                 , al respeceto hago de su conocimiento que se ha llevado a cabo el trámite solicitado, adjunto constancia de dicho movimiento."));

    $pdf->Ln(10);
    $pdf->SetFont('Arial','',10);
    $pdf->cell(12);
    $pdf->Cell(30,5,utf8_decode('Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo'));

    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->cell(75);
    $pdf->Cell(30,5,utf8_decode('A T E N T A M E N T E'));
    $pdf->Ln();
    $pdf->cell(64);
    $pdf->Cell(30,5,utf8_decode('EL ENCARGADO DEL DESPACHO'));
    $pdf->Ln();
    $pdf->cell(60);
    $pdf->Cell(30,5,utf8_decode('DEL SECRETARIADO EJECUTIVO DEL'));
    $pdf->Ln();
    $pdf->cell(54);
    $pdf->Cell(30,5,utf8_decode('SISTEMA ESTATAL DE SEGURIDAD PÚBLICA'));

    $pdf->Ln(25);
    // $pdf->cell(56);
    // $pdf->Cell(30,5,utf8_decode('ING. HUGO HUMBERTO CHAVEZ DELGADO'));
    //Nombre del C.P.

    $pdf->Ln();

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,5,utf8_decode('C.c.p.'));
    $pdf->Ln(10);
    // $pdf->SetFont('Arial','B',10);
    // $pdf->Cell(30,5,utf8_decode('C.P JOSÉ ALFREDO CÁVEZ GONZÁLEZ.-.- '));
    //Nombre del Coordinador General de Administracion de Tecnologias del SESESP
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(43);
    $pdf->Cell(30,5,utf8_decode('Coordinador General de Administración de Tecnologías del SESESP.- Para su conocimiento'));
    $pdf->Ln();
    // $pdf->SetFont('Arial','B',10);
    // $pdf->Cell(30,5,utf8_decode('ING- JORGE EDUARDO NAVA TADEO.-.- '));
    // Nombre del Director General de Operaciones e Inteligencia de la SSP
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(43);
    $pdf->Cell(30,5,utf8_decode('Director General de Operaciones e Inteligencia de la SSP.- Igual fin'));
    $pdf->Ln();
    // $pdf->SetFont('Arial','B',10);
    // $pdf->Cell(30,5,utf8_decode('C.P JOSÉ ALFREDO CÁVEZ GONZÁLEZ.-.- '));
    //Nombre del Subcoordinador de Sistemas de Informacion del SESESP
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(43);
    $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Mismo fin'));
    $pdf->Ln();
   
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(30,5,utf8_decode('Archivo.'));
    $pdf->Ln();
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,5,utf8_decode('JACHG/HHCHD/NAVA'));

    $pdf->Ln(5);
    // $pdf->Cell(40);
    // $pdf->SetFont('Arial','',8);
    // $pdf->Cell(30,5,utf8_decode('"Año 2018. Centenario del natalicio del escritor mexicano y universal Juan José Arreola"'));
    //Falta saber de donde se sacara cada año transcurrido 

    $pdf->Ln();
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(55);
    $pdf->Cell(30,5,utf8_decode('Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública'));
    $pdf->Ln();
    $pdf->Cell(45);
    $pdf->Cell(30,5,utf8_decode('C. Emilio Carranza esq. Ejército Nacional S/N, Colonia Centro, C.P. 28000'));
    $pdf->Ln();
    $pdf->Cell(65);
    $pdf->Cell(30,5,utf8_decode('Colima, Colima, México. Tel. (312) 3162603'));
    $pdf->Ln();
    $pdf->Cell(60);
    $pdf->Cell(30,5,utf8_decode('https://www.secretariadoejecutivosesp.col.gob.mx'));

   $pdf->Output();
?>