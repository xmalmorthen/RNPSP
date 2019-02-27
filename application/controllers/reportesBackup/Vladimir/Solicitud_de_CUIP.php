    <?php
        require('PDF/fpdf.php');
        $pdf = new FPDF();
        //funciones
        $pdf->AddPage();
        $pdf->Image("Logo.png",10,8,185,32);

        $pdf->SetFont('Arial','B',10);
        $pdf->SetXY(110,45);
        $pdf->Cell(10,10,utf8_decode("OFICIO No:")); //Número de oficio tecleado

        // $pdf->SetFont('Arial','B',9);
        // $pdf->SetXY(123,33);
        // $pdf->Cell(10,10,utf8_decode("Colima, Col ".$fecha));
        //Esto es la fecha y lugar

        $pdf->SetFont('Arial','B',10);
        $pdf->SetXY(110,55);
        $pdf->Cell(10,10,utf8_decode("Asunto:")); //Asunto del catálogo de asuntos

        $pdf->SetFont('Arial','B',10);
        $pdf->SetXY(20,61);
        $pdf->Cell(10,10,utf8_decode("")); //Nombre

        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(20,75);
        $pdf->Cell(10,10,utf8_decode("ENCARGADO DEL SECRETARIO EJECUTIVO DEL SISTEMA"));
        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(20,79);
        $pdf->Cell(10,10,utf8_decode("ESTATAL DE SEGURIDAD PÚBLICA"));
        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(20,83);
        $pdf->Cell(10,10,utf8_decode("PRESENTE"));


        $pdf->SetXY(20,100);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(170,7,utf8_decode("Por medio del presente me permito solicitarle a usted gire sus apreciables instrucciones a quien corresponda, a efecto de que se les asigne la Clave Única de Identificación Policial (CUIP) como          al personal que se enlista a continuación, los cuales se encuentran adscritos a la Dirección General de la Policía Estatal Acreditada con el perfil de Policía Preventivo, actualmente se encuentran realizando el Curso de Formación Inicial para Aspirantes que inició el 14 de Mayo del presente año en el Instituto de Formación, Capacitación y Profesionalización Policial del Estado."));

        $pdf->SetXY(20,160);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(170,5,utf8_decode("Sin otro particular por el momento, aprovecho la ocasión para hacerle llegar un cordial saludo."));

        $pdf->SetXY(85,189);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(168,5,utf8_decode("RESPETUOSAMENTE"));
        $pdf->SetXY(70,194);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(170,5,utf8_decode("SUFRAGIO EFECTIVO. NO REELECCIÓN"));
        $pdf->SetXY(48,199);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(170,5,utf8_decode("EL DIRECTOR GENERAL DE LA POLICÍA ESTATAL PREVENTIVA"));

        //En esta parte irán los siguientes datos
        /* 
        LIC "NOMBRE DEL LICENCIADO" --CENTRADO
        */

        $pdf->SetXY(20,230);
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(170,5,utf8_decode("C.c.p                                        Coordinador de Tecnologías y Proyectos Especiales del C4.- Para su conocimiento"));

        $pdf->SetXY(20,240);
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(170,5,utf8_decode("C.c.p."));

        $pdf->SetXY(30,240);
        $pdf->SetFont('Arial','B',10);
        $pdf->MultiCell(170,5,utf8_decode("ARCHIVO,"));


        $pdf->SetXY(20,250);
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(170,5,utf8_decode("jmho"));

        $pdf->SetXY(35,259);
        $pdf->SetFont('Arial','',8);
        $pdf->MultiCell(170,5,utf8_decode("*AÑO    , CENTENARIO DEL NATALICIO DEL ESCRITOR MEXICANO Y UNIVERSAL, JUAN JOSÉ ARREOLA"));

        $pdf->SetXY(50,264);
        $pdf->SetFont('Arial','',8);
        $pdf->MultiCell(170,5,utf8_decode("Roberto Esperón No.. 1152, Col. De los Trabajadores, C.P 28067, Colima, Colima, México."));

        $pdf->SetXY(70,267.6);
        $pdf->SetFont('Arial','',8);
        $pdf->MultiCell(170,5,utf8_decode("Tel. +52(312) 31 22090, 31 31484, FAX +52(312) 31 62034"));

        $pdf->SetXY(70,270.6);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(40,5,utf8_decode("www.colima-estado.gob.mx"),'B');


        $pdf->SetXY(110,270.6);
        $pdf->SetFont('Arial','B',8);
        $pdf->MultiCell(170,5,utf8_decode(", e-mail: dgpepe@hotmail.com"));

        $pdf->Output();
    ?>