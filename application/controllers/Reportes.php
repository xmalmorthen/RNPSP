<?php 

    class Reportes extends CI_Controller {

        protected $base;

        function __construct(){
            parent::__construct();
            $this->load->library("FPDF/fpdf");
            $this->base = base_url();            

        }

        private function getDate(){
            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

            return $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        }

        // XMAL //
        public function ajaxImprimirSolicitudes(){
			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
                if (!$this->input->post())
					throw new rulesException('Petición inválida');

                $model = [];
                if ($_POST["model"])
				    parse_str($_POST["model"], $model);
                else
                    $model = $_POST;

                $model['ID_ADSCRIPCION'] = $this->session->userdata(SESSIONVAR)['ID_ADSCRIPCION'];
                if (! $model['ID_ADSCRIPCION'])
                    throw new rulesException('Adscripción no estalecida');


                $this->load->model('REPORTES_model');
                $responseModel= [ 'status' => 0];
                switch ($model['optionPDF']) {
                    case 'PSB': //Petición Solicitud de baja
                        $responseModel = $this->REPORTES_model->PSB($model);
                        break;
                    case 'PSEC': //Petición Solicitud de examen de confianza
                        $responseModel = $this->REPORTES_model->PSEC($model);
                        break;
                    case 'PSC': //Petición Solicitud de curso
                        $responseModel = $this->REPORTES_model->PSC($model);
                        break;
                    case 'PCUIP': //Petición de CUIP
                        $responseModel = $this->REPORTES_model->PCUIP($model);
                        break;
                    case 'PCA': //Petición de cambio de adscripción
                        $responseModel = $this->REPORTES_model->PCA($model);
                        break;
                    case 'PSA': //Petición solicitud de alta
                        $responseModel = $this->REPORTES_model->PSA($model);
                        break;
                    case 'RSB': //Respuesta solicitud de baja
                        $responseModel = $this->REPORTES_model->RSB($model);
                        break;
                    case 'RSA': //Respuesta solicitud de alta
                        $responseModel = $this->REPORTES_model->RSA($model);
                        break;                    
                    default:
                        throw new rulesException('Formato de oficio incorrecto');
                        break;
                }

                if ($responseModel['status'] == 1) {

                    if ($model['valida'] == "false"){
                    
                        $model['data']= $responseModel;
                        
                        switch ($model['optionPDF']) {
                            case 'PSB': //Petición Solicitud de baja
                                $this->solicitudBaja($model);
                                break;
                            case 'PSEC': //Petición Solicitud de examen de confianza
                                $this->solicitudControlConfianza($model);
                                break;
                            case 'PSC': //Petición Solicitud de curso
                                $this->validacionCursoAprobado($model);
                                break;
                            case 'PCUIP': //Petición de CUIP
                                $this->Solicitud_CUIP($model);
                                break;
                            case 'PCA': //Petición de cambio de adscripción
                                $this->solicitudCambio($model);
                                break;
                            case 'PSA': //Petición solicitud de alta
                                $this->solicitudAlta($model);
                                // $this->altaElemento($model);
                                break;
                            case 'RSB': //Respuesta solicitud de baja
                                $this->RsolicitudBaja($model);
                                break;
                            case 'RSA': //Respuesta solicitud de alta
                                $this->altaElemento($model);
                                break;
                            default:
                                throw new rulesException('Formato de oficio incorrecto');
                                break;
                        }
                    }

                } else {
                    throw new rulesException($responseModel['message']);
                }			                
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
                header("HTTP/1.0 500 " . utf8_decode($e->getMessage()));
			}
            
            header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

        //REPORTES IMPLEMENTADOS
        
        //Respuesta solicitud de alta
        function altaElemento($model = null){
            
            ob_start();
            
            //TODO: Xmal - Quitar línea al implementar
            array_push($model['data']['data'], [ 'nombre' => 'MIGUEL ANGEL', 'paterno' => 'RUEDA', 'materno' => 'AGUILAR' ]);
            array_push($model['data']['data'], [ 'nombre' => 'NOMBRE PERSONA 1', 'paterno' => 'PATERNO PERSONA 1', 'materno' => 'MATERNO PERSONA 1' ]);
            array_push($model['data']['data'], [ 'nombre' => 'NOMBRE PERSONA 2', 'paterno' => 'PATERNO PERSONA 2', 'materno' => 'MATERNO PERSONA 2' ]);
            array_push($model['data']['data'], [ 'nombre' => 'NOMBRE PERSONA 3', 'paterno' => 'PATERNO PERSONA 3', 'materno' => 'MATERNO PERSONA 3' ]);
            array_push($model['data']['data'], [ 'nombre' => 'NOMBRE PERSONA 5', 'paterno' => 'PATERNO PERSONA 4', 'materno' => 'MATERNO PERSONA 4' ]);
            // quitar hasta aquí al implementar

            $pdf = new FPDF();
            $pdf->AddPage();
        
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);
        
            // Información de cabecera parte derecha            
        
            $pdf->Cell(30,5,utf8_decode('OFICIO No.'),0,0,"R");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(35,5,utf8_decode($model['noFolio']),0,0,"R");
            // Dato de Número de folio
            $pdf->SetFont('Arial','',10);
        
            // $pdf->Cell(30,5,utf8_decode('SESP/SE/CGT/241/2018')); Número de oficio
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->cell(100);
            $pdf->Cell(18,5,"ASUNTO:");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode('Se notifica tramite solicitado.')); 
            $pdf->Ln();
            $pdf->cell(128);
            // $pdf->Cell(30,5,utf8_decode('trámite de ingreso al RNPSP')); Parte del asunto
            $pdf->Ln();
            $pdf->cell(90);
            $pdf->Cell(30,5,utf8_decode('Colima, Colima a ' . $this->getDate() )); 
            $pdf->Ln(10);
         
        
            // Datos del remitente
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode($model['dirCentroest']));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('ENCARGADO DEL SECRETARIO EJECUTIVO DEL SISTEMA,'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
            $pdf->Ln(10);
        
            // Comunicado
            $pdf->SetFont('Arial','',10);
        
            //Después de no. viene el número de oficio y la fecha completa.
            //Después de como va el tipo de elememto, como "elemento operativo".
            //Después de en el aplicativo de: va el nombre del .ugar, como el Registro Nacional de Personal de Seguridad Pública
            $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere el numeral 19,20 y además relativos a la ley del Sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no. " . $model['oficioNumero'] . ", " . date('jS F Y') . " del año en curso, en el cual se solicita realizar los movimientos de alta, como ALTA DE ELEMENTO, en el sistema para el registro de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP)  a los elementos que a continuación se enlistan:"));
        
            // Tabla 
        
            $pdf->Ln(10);
            $pdf->cell(10);
        
            // Headers
            $pdf->Cell(10,7,"No.",1);
            $pdf->Cell(70,7,"Nombre",1);
            
            if ( count($model['data']['data']) > 1 ) {
                $pdf->Cell(10,7,"No.",1);
                $pdf->Cell(70,7,"Nombre",1);
            }

            $pdf->Ln();
            // Data


            $pdf->cell(10);
            foreach ($model['data']['data'] as $key => $item) {

                $pdf->Cell(10,6, ($key + 1) ,1);
                $pdf->Cell(70,6, utf8_decode( ($item['nombre'] . ' ' . $item['paterno'] . ( $item['materno'] ? ' ' . $item['materno'] : '')) ),1);

                if ( (($key + 1) % 2) == 0 ) {
                    $pdf->Ln();
                    $pdf->cell(10);
                }

            }

            // $pdf->cell(10);
            // $pdf->Cell(40,6,1,1);
            // $pdf->Cell(40,6,"MIGUEL ANGEL RUEDA AGUILAR",1);
            // $pdf->Cell(40,6,4,1);
            // $pdf->Cell(40,6,"MIGUEL ANGEL RUEDA AGUILAR",1);


            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->cell(12);
            $pdf->SetXY(10,150);
            $pdf->MultiCell(180,5,utf8_decode('Al respecto hago de su conocimiento que se han llevado a cabo los trámites solicitados, adjunto constancias de dichos movimientos.'));
            $pdf->Ln(); 
            $pdf->Cell(30,5,utf8_decode('Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo.'));   
        
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',10);
     
            $pdf->Cell(0, 20, utf8_decode('A T E N T A M E N T E'), 0, 0, 'C');
            $pdf->Ln();
            $pdf->Cell(0, 20, utf8_decode('EL {Puesto de quien hace la peticion}' ), 0, 0, 'C');

        

            //Nombre del que va a firmar
            // $pdf->Ln(36);
            // $pdf->cell(50);
            $pdf->Ln(20);
            $pdf->cell(23);
            $pdf->Cell(30,5,utf8_decode($model['encargadoDespacho']));
        
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10); //Nombre del CP
            $pdf->Cell(30,5,utf8_decode($model['encargadoDespacho']));
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(43);
            $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
            $pdf->Ln();
            $pdf->SetFont('Arial','',10); //Nombre del sub coordinador
            $pdf->Cell(30,5,utf8_decode($model['subcoordinador']));
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
        
            $pdf->Output(null, 'ReporteAltaElemento-' . time() . '.pdf');
        }

        function altaAspirantesactivos($model){
            ob_start();
            
            $pdf = new FPDF();
            $pdf->AddPage();
        
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);
        
            // Información de cabecera parte derecha
        
            $pdf->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(35,5,utf8_decode('{Número de oficio}'),0,0,"R");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->cell(100);
            $pdf->Cell(30,5,'Asunto:',0,0,"R");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode('Se notifica trámite solicitado.'));
            $pdf->Ln();
        
            $pdf->cell(107);
            $pdf->Cell(25,5,utf8_decode('{Fecha formato: Colima, Colima , a 25 de Junio de 2018.}'));
            $pdf->Ln(10);
         
        
            // Datos del remitente
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode('{Nombre de quien emite el oficio},'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('{Cargo de quien emite el oficio},'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
            $pdf->Ln(10);
        
            // Comunicado
            $pdf->SetFont('Arial','',10);
        
        
            $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere el numeral 19, 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no. " . $model['oficioNumero'] . " de fecha {Fecha actual: 13 de junio} del año en curso, en el cual se solicita realizar los movimientos de alta en el aplicativo del para el registro de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP) , como aspirantes Activos a los elementos que a continuación se enlistan:"));
        
            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode('PEP'));
        
            // Tabla 
        
            $pdf->Ln(10);
            $pdf->cell(10);
        
            // Headers
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Ln();
            // Data
            $pdf->SetFont('Arial','',7);
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
          
            
            $pdf->MultiCell(185,5,utf8_decode("Al respecto hago de su conocimiento que se han llevado a cabo los trámites solicitados, adjunto constancias de dichos movimientos."));
            
            $pdf->Ln();
          
            $pdf->MultiCell(185,5,utf8_decode("Es pertinente hacer mención que la {Nombre de la persona a dar de alta}, ya se encuentra registrada en el  como Aspirante Activo desde el año 2016"));
        
            
            $pdf->Ln();
          
            $pdf->MultiCell(185,5,utf8_decode("Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo."));
        
        
            $pdf->Ln(8);
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
        
            $pdf->Ln(13);
            $pdf->cell(78);
            $pdf->Cell(30,5,utf8_decode('{Nombre del encargado}'));
        
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Nombre de coordinador} '));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(18);
            $pdf->Cell(30,5,utf8_decode('Coordinador General de Administración de Tecnologías del SESESP.- Similar fin.'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Nombre del subcoordinador}'));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(18);
            $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Mismo fin.'));
            $pdf->Ln();
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(30,5,utf8_decode('Archivo.'));
            $pdf->Ln();
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(30,5,utf8_decode('{Clave de archivo}'));
        
            $pdf->Ln();
            $pdf->Cell(52);
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(30,5,utf8_decode('"Año 2018. Centenario del natalicio del escritor mexicano y universal Juan José Arreola"'));
            $pdf->Ln();
            $pdf->Image($this->base."assets/images/Cintillo.png",72,253,65,1);
        
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
        
            return $pdf->Output(null,'Alta_Aspitante_' . time() . '.pdf');
        }

        function solicitudAlta($model=null){
            ob_start();

            $pdf = new FPDF();
            $pdf->AddPage();
        
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);
        
            // Información de cabecera parte derecha
        
            $pdf->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
            $pdf->SetFont('Arial','',10);
        
            $pdf->Cell(30,5, utf8_decode( $model['PSANoFolio'] /*'{Número de folio}'*/ ) );
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
            $pdf->Cell(30,5,utf8_decode('Colima, Colima, a ' . $this->getDate() /*'{Fecha formato: Colima, Colima , a 25 de Junio de 2018}'*/ ));
            $pdf->Ln(10);
         
        
            // Datos del remitente
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode( $model['PSANombreDestinoPeticion'] . ',' /*'{Nombre a quien va dirigida la petición},'*/));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode( $model['PSAPuestoDestinoPeticion'] . ',' /*'{Puesto al que va dirigida la petición},'*/));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
            $pdf->Ln(10);
        
            // Comunicado
            $pdf->SetFont('Arial','',10);
        
        
            $pdf->MultiCell(185,5,utf8_decode("Por instrucciones del Encargado del despacho del Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública, el " .
                $model['PSANombreEncargadoSESESP'] . /*{Nombre del encargado de SESESP}*/ ", y con fundamento en el numeral 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima, y con el objetivo de dar cumplimiento al requisito señalado en los artículos 39, apartado B, fracción VIII, apartado B, fracción VI de la LGSNSP, para el registro de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP) , me permito solicitar la validación que certifique que el personal enlistado posee controles de confianza aprobados y vigentes."));
        
            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode('PEP'));

            $pdf->SetFont('Arial','',7);
        
            // Tabla 
        
            // $pdf->Ln(10);
            // $pdf->cell(10);
        
            // // Headers
            // $pdf->Cell(40,7,"No.",1);
            // $pdf->Cell(40,7,"Nombre",1);
            // $pdf->Cell(40,7,"No.",1);
            // $pdf->Cell(40,7,"Nombre",1);
            // $pdf->Ln();
            // // Data
            // $pdf->SetFont('Arial','',10);
            // $pdf->cell(10);
            // $pdf->Cell(40,6,1,1);
            // $pdf->Cell(40,6,"",1);
            // $pdf->Cell(40,6,4,1);
            // $pdf->Cell(40,6,"",1);
            // $pdf->Ln();
            // $pdf->cell(10);
            // $pdf->Cell(40,6,2,1);
            // $pdf->Cell(40,6,"",1);
            // $pdf->Cell(40,6,5,1);
            // $pdf->Cell(40,6,"",1);
            // $pdf->Ln();
            // $pdf->cell(10);
            // $pdf->Cell(40,6,3,1);
            // $pdf->Cell(40,6,"",1);
            // $pdf->Cell(40,6,6,1);
            // $pdf->Cell(40,6,"",1);


            /*TABLA FOREACH*/
            
            $pdf->Ln(10);
            $pdf->cell(10);
        
            // Headers
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            
            if ( count($model['data']['data']) > 1 ) {
                $pdf->Cell(8,7,"No.",1);
                $pdf->Cell(72,7,"Nombre",1);
            }

            $pdf->Ln();
            // Data

            $pdf->cell(10);

            $iter = 1;
            foreach ($model['data']['data'] as $key => $item) {
                if ($item['estatus'] == 1) 
                {

                    $pdf->Cell(8,6, $iter ,1);
                    $pdf->Cell(72,6, utf8_decode( ($item['nombre'] . ' ' . $item['paterno'] . ( $item['materno'] ? ' ' . $item['materno'] : '')) ),1);

                    if ( ( $iter % 2) == 0 ) {
                        $pdf->Ln();
                        $pdf->cell(10);
                    }

                    $iter++;
                }
                
            }

            if ( count($model['data']['data']) > 1 ) {
                if ( ( ($iter -1) % 2 )  != 0 ){
                    $pdf->Cell(8,6, $iter ,1);
                    $pdf->Cell(72,6, utf8_decode( '----------------------------------------------' ),1);
                }
            }

            /*/TABLA FOREACH */

            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->cell(12);
            $pdf->Cell(30,5,utf8_decode('Sin otro particular hago propicia la ocasión para hacerle llegar un cordial saludo'));
        
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(0,20,utf8_decode('A T E N T A M E N T E'),0,0,'C');
            $pdf->Ln();
            $pdf->Cell(0, 20, utf8_decode( $model['PSAPuesto']), 0, 0, 'C');
            $pdf->Ln();
            $pdf->cell(78);
            $pdf->Cell(30,5,utf8_decode(''));
            $pdf->Ln();
            $pdf->cell(76);
            $pdf->Cell(30,5,utf8_decode(''));
        
            $pdf->Ln(25);
            $pdf->Cell(0,0,utf8_decode( $model['PSANombreRemitentePeticion'] /*'{Nombre del que hizo la petición}'*/),0,0,'C');
        
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode( $model['PSANombreEncargadoDespachoSESESP'] /*'{cargo y nombre del encargado del SESP}'*/));            
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(25);
            $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode( $model['PSANombreSubSESESP'] /*'{cargo y nombre del Subcoordinador del SESESP}'*/));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(25);
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
            $pdf->Image($this->base."assets/images/Cintillo.png",72,253,65,1);
        
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
        
        
            $pdf->Output(null, 'PeticionSolicitudAlta-' . time() . '.pdf');
        }
        
        // Respuesta a solicitud de alta
        function RsolicitudAlta($model){
            $pdf = new FPDF();
            $pdf->AddPage();
        
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
           
            $pdf->cell(105);
        
            // Información de cabecera parte derecha
        
            $pdf->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
            $pdf->SetFont('Arial','',10);
        
            $pdf->Cell(30,5,utf8_decode('{Número de folio}'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->cell(100);
            $pdf->Cell(30,5,'Asunto:',0,0,"R");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode('Se notifica tramite solicitado'));
            $pdf->Ln();
            $pdf->cell(107);
            $pdf->Cell(30,5,utf8_decode('{Fecha formato: Colima, Colima , a 25 de Junio de 2018}'));
            $pdf->Ln(10);
         
        
            // Datos del remitente
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode('{Nombre al que va dirigido el oficio},'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('{Cargo al que va dirigido el oficio},'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
            $pdf->Ln(10);
        
            // Comunicado
            $pdf->SetFont('Arial','',10);
        
        
            $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere en numeral 19, 20 y además relativos a la ley del sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no. {Respuesta al oficio número}, {Fecha que se emitió el oficio} del año {Año}, en el cual se solicita realizar los movimientos de alta, como {Tipo de elemento}, en el para el registro de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP) a los elementos que a continuación se enlistan: "));
        
            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode('PEP'));
        
            // Tabla 
        
            $pdf->Ln(10);
            $pdf->cell(10);
        
            // Headers
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Ln();
            // Data
            $pdf->SetFont('Arial','',7);
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(185,5,utf8_decode('Al respecto hago de su conocimiento que se han llevado a cabo los trámties solicitados, adjunto constancias de dichos movimientos'));
            $pdf->Ln(10);
            $pdf->Cell(30,5,utf8_decode('Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(0, 10, utf8_decode( 'A T E N T A M E N T E'), 0, 0, 'C');
            $pdf->Ln();

            $pdf->Cell(0, 0, utf8_decode('{Cargo}'), 0, 0, 'C');
        
            $pdf->Ln(15);
            $pdf->Cell(0, 20, utf8_decode( '{Nombre del encargado del despacho del secretariado ejecutivo del SESESP}'), 0, 0, 'C');
   
        
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{nombre encargado del despacho}'));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(25);
            $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Nombre del Subcoordinador}'));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(25);
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
            $pdf->Image($this->base."assets/images/Cintillo.png",72,253,65,1);
        
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
        }
        
        // Petición solicitud baja
        function solicitudBaja($model){
            ob_start();

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);

            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);
            // Información de cabecera parte derecha
            $pdf->Ln(10);
            // Comunicado
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(185,5,utf8_decode("Por medio del presente y por instrucciones del FISCAL GENERAL DEL ESTADO, me permito solicitar a usted de no haber inconveniente alguno, con fecha {Fecha: dia y mes} se haga la BAJA de {Nombre del activo} por {Motivo de la baja} en el Registro Nacional de Personal de Seguridad Pública"));
            $pdf->Ln(5);
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(185,5,utf8_decode("{Nombre del puesto}"));
            $pdf->Ln(5);
            $pdf->MultiCell(185,5,utf8_decode("Sin otro particular por el momento, le mando un cordial saludo."));

            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',8);
            $pdf->cell(82);
            $pdf->Cell(30,5,utf8_decode('A T E N T A M E N T E'));
            $pdf->Ln();
            $pdf->cell(69);
            $pdf->Cell(30,5,utf8_decode('SUFRAGIO EFECTIVO, NO REELECCIÓN'));
            $pdf->Ln();
            $pdf->cell(60);
            $pdf->Cell(30,5,utf8_decode('{Fecha formato: COLIMA, COL.,29 DE ABRIL DE 2019}'));
            $pdf->Ln();
            $pdf->cell(51);
            $pdf->Cell(30,5,utf8_decode('ENCARGADO DE LA DIRECCIÓN DE SERVICIOS ADMINISTRATIVOS'));

            $pdf->Ln(10);
            $pdf->Ln(10);
            $pdf->Cell(20,7,utf8_decode("Elaboró:"),1);
            $pdf->Cell(70,7,utf8_decode("{Nombre de la persona que elaboró la solicitud}"),1);
            $pdf->SetFont('Arial','',6);
            $pdf->Ln(20);
            $pdf->Cell(65);
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(30,5,utf8_decode('"Año 2019, 30 años de la convención sobre los derechos del niño"'));
            $pdf->SetFont('Arial','',6);
            $pdf->Ln();
            $pdf->Cell(49);
            $pdf->Cell(30,4,utf8_decode('Libramiento Ejército Mexicano No. 200 Colonia Los Trabajadores, C.P. 28067 Colima, Colima, México'));
            $pdf->Ln();
            $pdf->Cell(58);
            $pdf->Cell(30,4,utf8_decode('Tel +52 (312) 31 27940, 31 27910, 31 23087, 31 42334. www.colima-estado.gob.mx'));
            $pdf->Image($this->base."assets/images/Cintillo.png",72,253,65,1);
            
            $pdf->Output(null, 'PeticionSolicitudBaja-' . time() . '.pdf');            
        }

        // Respuesta a solicitud de baja
        function RsolicitudBaja(){
            $pdf = new FPDF();
            $pdf->AddPage();
        
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);
        
            // Información de cabecera parte derecha
        
            $pdf->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
            $pdf->SetFont('Arial','',10);
        
            $pdf->Cell(30,5,utf8_decode('{Número de folio}'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->cell(100);
            $pdf->Cell(30,5,'Asunto:',0,0,"R");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode('Se notifica tramite solicitado'));
            $pdf->Ln();
            $pdf->cell(107);
            $pdf->Cell(30,5,utf8_decode('{Fecha formato: Colima, Colima , a 25 de Junio de 2018}'));
            $pdf->Ln(10);
         
        
            // Datos del remitente
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode('{Nombre al que va dirigido el oficio},'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('{Cargo al que va dirigido el oficio},'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
            $pdf->Ln(10);
        
            // Comunicado
            $pdf->SetFont('Arial','',10);
        
        
            $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere en numeral 19, 20 y además relativos a la ley del sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no. {Respuesta al oficio número}, del año {Año}, signado por el Director General de Operaciones e Inteligencia, en el cual se solicita realizar el trámite de baja en el aplicativo del Registro Nacional de Personal de Seguridad Pública (RNPSP), {Nombre de la persona a dar a baja}, al respecto hago de su conocimiento que se ha llevado a cabo el trámite solicitado, adjunto constancia de dicho movimiento "));
        
            $pdf->Ln(5);
            $pdf->SetFont('Arial','',10);
        
            $pdf->Cell(30,5,utf8_decode('PEP'));
        
              
            $pdf->Ln(10);
            $pdf->Cell(30,5,utf8_decode('Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(0,0,utf8_decode('A T E N T A M E N T E'),0 ,0 ,'C');
            $pdf->Ln();
            $pdf->Cell(0,10,utf8_decode('{Cargo}'), 0, 0, 'C');

            $pdf->Ln(15);

            $pdf->Cell(0,5,utf8_decode('{Nombre del encargado del despacho del secretariado ejecutivo del SESESP}'), 0, 0, 'C');
        
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(10);
       
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(30,5,utf8_decode('{Coordinador de TI de SESESP}'));
            $pdf->Cell(25);
            $pdf->Cell(30,5,utf8_decode('Coordinador General de Administración de Tecnologías del SESESP.- Para su conocimiento'));
            $pdf->Ln();
    
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(30,5,utf8_decode('{Director general Op e Int SSP}'));
            $pdf->Cell(25);
            $pdf->Cell(30,5,utf8_decode('Director General de Operaciones e Inteligencia de la SSP.- Igual fin'));
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(30,5,utf8_decode('{Subcoordinador De SI del SESESP}'));
            $pdf->Cell(30);
            $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Mismo fin'));
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
            $pdf->Image($this->base."assets/images/Cintillo.png",72,253,65,1);
        
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
        }

        //Petición de cambio de adscripción
        function solicitudCambio(){
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);

            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);
            // Información de cabecera parte derecha
            $pdf->Ln(10);
            // Comunicado
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(185,5,utf8_decode("Por medio del presente y por instrucciones del FISCAL GENERAL DEL ESTADO, me permito solicitar a usted de no haber inconveniente alguno, con fecha {Fecha formato: 29 de ABRIL} se haga de haga EL CAMBIO DE ADSCRIPCIÓN DE LA PGJE A LA FISCALÍA GENERAL DEL ESTADO DE COLIMA en el Registro Nacional de Personal de Seguridad Pública, a los elementos que enlisto a continuación:"));
            $pdf->SetFont('Arial','',10);
            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,7,"");
            $pdf->Ln();
            $pdf->Cell(40,7,"");
            $pdf->Ln();
            $pdf->Cell(40,7,"");
            $pdf->Ln();
            $pdf->Cell(40,7,"");
            $pdf->Ln();
            $pdf->Cell(40,7,"");
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(185,5,utf8_decode("TODOS LOS ELEMENTOS CON PUESTO FUNCIONAL DE AGENTE DE MINISTERIO PÚBLICO, NIVEL DE MANDO OPERATIVO, EN LA DIRECCIÓN GENERAL DE PROCEDIMIENTOS PENALES."));

            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',8);
            $pdf->cell(82);
            $pdf->Cell(30,5,utf8_decode('A T E N T A M E N T E'));
            $pdf->Ln();
            $pdf->cell(69);
            $pdf->Cell(30,5,utf8_decode('SUFRAGIO EFECTIVO, NO REELECCIÓN'));
            $pdf->Ln();
            $pdf->cell(72);
            $pdf->Cell(30,5,utf8_decode('COLIMA, COL.,{fECHA ACTUAL}'));
            $pdf->Ln();
            $pdf->cell(51);
            $pdf->Cell(30,5,utf8_decode('ENCARGADO DE LA DIRECCIÓN DE SERVICIOS ADMINISTRATIVOS'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',6);
            $pdf->Ln(100);
            $pdf->Cell(65);
            $pdf->Image($this->base."assets/images/Cintillo.png",75,260,65,1);
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(30,5,utf8_decode('"Año 2019, 30 años de la convención sobre los derechos del niño"'));
            $pdf->SetFont('Arial','',6);
            $pdf->Ln();
            $pdf->Cell(49);
            $pdf->Cell(30,4,utf8_decode('Libramiento Ejército Mexicano No. 200 Colonia Los Trabajadores, C.P. 28067 Colima, Colima, México'));
            $pdf->Ln();
            $pdf->Cell(58);
            $pdf->Cell(30,4,utf8_decode('Tel +52 (312) 31 27940, 31 27910, 31 23087, 31 42334. www.colima-estado.gob.mx'));
            $pdf->Output();

        }

        //Nomenclaturas:
        // CyC: Control y confianza
        function validarCyC_AprobadosVigentes(){
            $pdf = new FPDF();
            $pdf->AddPage();
        
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);
        
            // Información de cabecera parte derecha
        
            $pdf->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
            $pdf->SetFont('Arial','',10);
        
            $pdf->Cell(30,5,utf8_decode('{Número de folio}'));
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
            $pdf->cell(97);
            $pdf->Cell(30,5,utf8_decode('{Fecha y lugar formato: Colima, Colima , a 25 de Junio de 2018}'));
            $pdf->Ln(10);
         
        
            // Datos del remitente
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode('{Nombre de quien va dirigido}'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('DIRECTOR DEL CENTRO ESTATAL DE EVALUACIÓN Y CONTROL DE CONFIANZA,'));
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
            $pdf->Ln(10);
        
            // Comunicado
            $pdf->SetFont('Arial','',10);
        
        
            $pdf->MultiCell(185,5,utf8_decode("Por instrucciones del Encargado del despacho del Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública, {Nombre del encargado del SESESP}, y con fundamento en el numeral 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima, y con el objetivo de dar cumplimiento al requisito señalado en los artículos 39, apartado B, fracción VIII, apartado B, fracción VI de la LGSNSP, para el registro de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP) , me permito solicitar la validación que certifique que el personal enlistado posee controles de confianza aprobados y vigentes."));
        
            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(30,5,utf8_decode('PEP'));
        
            // Tabla 
        
            $pdf->Ln(10);
            $pdf->cell(10);
        
            // Headers
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Ln();
            // Data
            $pdf->SetFont('Arial','',7);
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->cell(12);
            $pdf->Cell(30,5,utf8_decode('Sin otro particular hago propicia la ocasión para hacerle llegar un cordial saludo'));
        
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',8);
      
            $pdf->Cell(0,5,utf8_decode('A T E N T A M E N T E'), 0, 0, 'C');
            $pdf->Ln();

            $pdf->Cell(0,5,utf8_decode('EL {Cargo de quien solicita}'),0,0, 'C');

        
            $pdf->Ln(25);
            $pdf->Cell(0,0,utf8_decode('{Nombre de quien solicita}'),0,0, 'C');
        
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Nombre del encargado del SESP}'));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(18);
            $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Npmbre del coordinador de SI}'));
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
            $pdf->Image($this->base."assets/images/Cintillo.png",72,238,65,1);
        
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
        
        
        }
        
        //  Petición solicitud curso
        function validacionCursoAprobado(){

            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);

            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);

            // Información de cabecera parte derecha

            $pdf->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
            $pdf->SetFont('Arial','',10);

            $pdf->Cell(30,5,utf8_decode('{Número de folio}'));
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
            $pdf->cell(90);
            $pdf->Cell(30,5,utf8_decode('{Fecha y lugar formato: Colima, Colima , a 25 de Junio de 2018}'));
            $pdf->Ln(10);
        

            // Datos del remitente
            $pdf->SetFont('Arial','B',10);

            $pdf->Cell(30,5,utf8_decode('{Nombre a quien va dirigido el oficio}'));
            $pdf->Ln();
        
            $pdf->Cell(30,5,utf8_decode('DIRECTOR DEL INSTITUTO DE FORMACIÓN'));
            $pdf->Ln();
        
            
            $pdf->Cell(30,5,utf8_decode('CAPACITACIÓN Y PROFESIONALIZACIÓN POLICIAL,'));
            $pdf->Ln();

            $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
            $pdf->Ln(10);

            // Comunicado
            $pdf->SetFont('Arial','',10);


            $pdf->MultiCell(185,5,utf8_decode("Por instrucciones del Encargado del despacho del Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública, el {Nombre del encargado}, y con fundamento en el numeral 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima, y con el objetivo de dar cumplimiento al requisito señalado en los artículos 39, apartado B, fracción VIII Y 88 apartado A, fracción VII, apartado B, fracción VI de la LGSNSP, para el ingreso de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP), me permito solicitar la validación que certifique que el personal enlistado haya aprobado el curso de formación inicial."));

            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',10);

            $pdf->Cell(30,5,utf8_decode('PEP'));

            // Tabla 

            $pdf->Ln(10);
            $pdf->cell(10);

            // Headers
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(60,7,"Nombre",1);
            $pdf->Cell(50,7,"Perfil",1);
            $pdf->Cell(60,7,"Dependencia",1);
            $pdf->Ln();
            // Data
            $pdf->SetFont('Arial','',7);
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(60,6,"",1);
            $pdf->Cell(50,6,"",1);
            $pdf->Cell(60,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(60,6,"",1);
            $pdf->Cell(50,6,"",1);
            $pdf->Cell(60,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(60,6,"",1);
            $pdf->Cell(50,6,"",1);
            $pdf->Cell(60,6,"",1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->cell(12);
            $pdf->Cell(30,5,utf8_decode('Sin otro particular hago propicia la ocasión para hacerle llegar un cordial saludo'));
            // NUEVO CÓDIGO
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(0,5,utf8_decode('A T E N T A M E N T E'), 0, 0, 'C');
            $pdf->Ln();
            $pdf->Cell(0,5,utf8_decode('EL {Cargo de quien solicita}'), 0, 0, 'C');

            $pdf->Ln(25);
        
            $pdf->Cell(0,0,utf8_decode('{Nombre de quien solicita}'), 0,0, 'C');

            $pdf->Ln();

            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Nombre del encargado del despacho SESP}'));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(18);
            $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Nombre del subcoordinador de SI SESESP}'));
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
            $pdf->Image($this->base."assets/images/Cintillo.png",72,244,65,1);

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
        }

        function bajaAplicativo(){

            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);

            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(105);

            // Información de cabecera parte derecha

            $pdf->Cell(30,5,utf8_decode('OFICIO No.'),0,0,"R");
            $pdf->SetFont('Arial','',10);

            $pdf->Cell(30,5,utf8_decode('{Número de folio}'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->cell(100);
            $pdf->Cell(30,5,'ASUNTO:',0,0,"R");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode('Se notificará trámite solicitado'));
            $pdf->Ln();
            // $pdf->cell(107);
            // $pdf->Cell(30,5,utf8_decode('Colima, Colima , a 25 de Junio de 2018'));
            //Fecha generada automaticamente
            $pdf->Ln(10);
        
            // Datos del remitente
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,5,utf8_decode('{Nombre del coordinador administrativo de SSP}'));
            $pdf->Ln();
        
            $pdf->Cell(30,5,utf8_decode('P R E S E N T E.'));
            $pdf->Ln(10);

            // Comunicado
            $pdf->SetFont('Arial','',10);

            //Despues de oficio no. va el numero de oficio y la fecha del año en curso
            //Despues de (RNPSP), Se escribe dependiendo del sexo "del ciudadano o de la ciudadana",
            $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere el numeral 19, 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no. {Respuesta a folio} del año en curso, signado por el Director General de Operaciones e Inteligencia, en el cual se solicita realizar el trámite de baja en el aplicativo del Registro Nacional de Personal de Seguridad Pública (RNPSP), {Nombre de la persona a dar a baja} , al respecto hago de su conocimiento que se ha llevado a cabo el trámite solicitado, adjunto constancia de dicho movimiento."));

            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->cell(12);
            $pdf->Cell(30,5,utf8_decode('Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo'));

            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',0);
       
            $pdf->Cell(0,5,utf8_decode('A T E N T A M E N T E'),0,0,'C');
            $pdf->Ln();
         
            $pdf->Cell(0,5,utf8_decode('{Cargo}'), 0, 0, 'C');
        
            $pdf->Ln(25);
  
            $pdf->Cell(0,5,utf8_decode('{Nombre del encargado del despacho del SESP}'),0,0,'C');
            $pdf->Ln(10);
            // $pdf->cell(56);
            // $pdf->Cell(30,5,utf8_decode('ING. HUGO HUMBERTO CHAVEZ DELGADO'));
            //Nombre del C.P.

            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(10);
            // $pdf->SetFont('Arial','B',10);
            // $pdf->Cell(30,5,utf8_decode('C.P JOSÉ ALFREDO CÁVEZ GONZÁLEZ.-.- '));
            //Nombre del Coordinador General de Administracion de Tecnologias del SESESP
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('{Coordinador de TI de SESESP}'));
            $pdf->Cell(25);
            $pdf->Cell(30,5,utf8_decode('Coordinador General de Administración de Tecnologías del SESESP.- Para su conocimiento'));
            $pdf->Ln();
            // $pdf->SetFont('Arial','B',10);
            // $pdf->Cell(30,5,utf8_decode('ING- JORGE EDUARDO NAVA TADEO.-.- '));
            // Nombre del Director General de Operaciones e Inteligencia de la SSP
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('{Director general Op e Int SSP}'));
            $pdf->Cell(25);
            $pdf->Cell(30,5,utf8_decode('Director General de Operaciones e Inteligencia de la SSP.- Igual fin'));
            $pdf->Ln();
            // $pdf->SetFont('Arial','B',10);
            // $pdf->Cell(30,5,utf8_decode('C.P JOSÉ ALFREDO CÁVEZ GONZÁLEZ.-.- '));
            //Nombre del Subcoordinador de Sistemas de Informacion del SESESP
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('{Subcoordinador De SI del SESESP}'));
            $pdf->Cell(30);
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
        }
        
        function/*peticion*/ solicitudControlConfianza(){
            $pdf = new FPDF();
            $pdf->AddPage();
        
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(140);
        
            // Información de cabecera parte derecha
        
            $pdf->Cell(30,5,utf8_decode('Oficio No.{número de oficio}'),0,0,"R");
            $pdf->SetFont('Arial','',10);
        
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
            $pdf->Cell(30,5,utf8_decode('Colima, Colima , a {fecha del sistema}'));
            $pdf->Ln(10);
         
        
            // Datos del remitente
            $pdf->SetFont('Arial','B',10);
        
            $pdf->Cell(60,5,utf8_decode('{Nombre a quien va dirigido}')); //Nombre del director del centro estatal de evaluación
            $pdf->Ln();
          
            $pdf->Cell(30,5,utf8_decode('DIRECTOR DEL CENTRO ESTATAL DE EVALUACION Y CONTROL DE CONFIANZA'));
            $pdf->Ln();
        
            $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
            $pdf->Ln(10);
        
            // Comunicado
            $pdf->SetFont('Arial','',10);
        
        
            $pdf->MultiCell(185,5,utf8_decode("Por instrucciones del Encargado del despacho del Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública, {Nombre del Encargado del despacho del Secretariado Ejecutivo}, y con fundamento en el numeral 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima, y con el objetivo de dar cumplimiento al requisito señalado en los artículos 39, apartado B, fracción VIII Y 88, apartado A, fracción VII, apartado B, fracción VI de la LGSNSP, para el ingreso de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP), me permito solicitar la validación que certifique que el personal enlistado posee controles de confianza aprobados y vigentes."));
        
            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(5);
            $pdf->Cell(30,5,utf8_decode('SSP (PERSONAL ADMINISTRATIVO)'));
            $pdf->Ln(7);
            $pdf->Cell(5);
            $pdf->Cell(30,5,utf8_decode('ALTAS'));
        
            // Tabla 
        
            $pdf->Ln(5);
            $pdf->cell(5);
        
            // Headers
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',7);
            // Data
           
            $pdf->cell(5);
            $pdf->Cell(8,6,'',1);
            $pdf->Cell(72,6,utf8_decode(''),1);
            $pdf->Cell(8,6,"",1);
            $pdf->Cell(72,6,utf8_decode(''),1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->cell(12);
        
        
            $pdf->SetFont('Arial','B',10);
            $pdf->Ln(7);
            $pdf->Cell(5);
          
            $pdf->SetFont('Arial','',10);
            $pdf->cell(12);
            $pdf->Cell(30,5,utf8_decode('Sin otro particular hago propicia la ocasión para hacerle llegar un cordial saludo'));
        
        
            $pdf->Ln(9);
            $pdf->SetFont('Arial','B',8);
    
            $pdf->Cell(0,5,utf8_decode('A T E N T A M E N T E'),0,0,"C");
            $pdf->Ln();
            $pdf->Cell(0,5,utf8_decode('EL {Cargo de quien solicita}'),0,0,'C');
        
            $pdf->Ln(20);
            $pdf->Cell(0,0,utf8_decode('{Nombre de quien solicita}'),0,0,'C');
        
            $pdf->Ln();
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('C.c.p.'));
            $pdf->Ln(9);
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Encargado del despacho del Secretariado Ejecutivo del SESP}.-.- '));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(40);
            $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
            $pdf->Ln();
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(30,5,utf8_decode('{Subcoordinador de Sistemas de Información del SESESP}.-.- '));
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(40);
            $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Igual fin.'));
            $pdf->Ln();
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(30,5,utf8_decode('Archivo.'));
            $pdf->Ln();
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(30,5,utf8_decode('JACHG/HHCHD/NAVA'));
        
            $pdf->Ln(4);
            $pdf->Cell(52);
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(30,5,utf8_decode('"Año 2018. Centenario del natalicio del escritor mexicano y universal Juan José Arreola"'));
            $pdf->Ln();
            $pdf->Image($this->base."assets/images/Cintillo.png",72,233,65,1);
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
        
        }

        function/*peticion*/ Solicitud_CUIP(){

            $pdf = new FPDF();
            //funciones
            $pdf->AddPage();
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
    
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(110,45);
            $pdf->Cell(10,10,utf8_decode("OFICIO No:"));
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(130,45);
            $pdf->Cell(10,10,utf8_decode("{Número de folio}")); //Número de oficio tecleado
    
            // $pdf->SetFont('Arial','B',9);
            // $pdf->SetXY(123,33);
            // $pdf->Cell(10,10,utf8_decode("Colima, Col ".$fecha));
            //Esto es la fecha y lugar
    
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(110,55);
            $pdf->Cell(15,10,utf8_decode("Asunto:"));
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(10,10,utf8_decode("Se notificará trámite solicitado {Fecha}")); //Asunto del catálogo de asuntos
    
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,61);
            $pdf->Cell(10,10,utf8_decode("Se notifica tramite solicitado.")); //Nombre
    
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(20,70);
            $pdf->Cell(10,10,utf8_decode("{Nombre a quien va dirigido el oficio}"));
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
            $pdf->MultiCell(170,7,utf8_decode("Por medio del presente me permito solicitarle a usted gire sus apreciables instrucciones a quien corresponda, a efecto de que se les asigne la Clave Única de Identificación Policial (CUIP) como {tipo de trabajador} al personal que se enlista a continuación, los cuales se encuentran adscritos a la Dirección General de la Policía Estatal Acreditada con el perfil de Policía Preventivo, actualmente se encuentran realizando el Curso de Formación Inicial para Aspirantes que inició el {Día y mes} del {Año del oficio} en el Instituto de Formación, Capacitación y Profesionalización Policial del Estado."));
    
            $pdf->SetXY(20,160);
            $pdf->SetFont('Arial','',12);
            $pdf->MultiCell(170,5,utf8_decode("Sin otro particular por el momento, aprovecho la ocasión para hacerle llegar un cordial saludo."));
    
            $pdf->SetXY(85,182);
            $pdf->SetFont('Arial','B',0);
            $pdf->MultiCell(168,5,utf8_decode("ATENTAMENTE"));
            $pdf->SetXY(80,190);
            $pdf->MultiCell(170,5,utf8_decode("{cargo de quien solicita}"));
    
            $pdf->SetXY(78,225);
            $pdf->MultiCell(170,5,utf8_decode("{Nombre de quien solicita}"));
            
            $pdf->SetXY(20,240);
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(170,5,utf8_decode("C.c.p{nombre del coordinador de t.}Coordinador de Tecnologías y Proyectos Especiales del C4.- Para su conocimiento"));
    
            $pdf->SetXY(20,250);
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(170,5,utf8_decode("C.c.p."));
    
            $pdf->SetXY(30,250);
            $pdf->SetFont('Arial','B',10);
            $pdf->MultiCell(170,5,utf8_decode("ARCHIVO,"));
    
    
            $pdf->SetXY(20,255);
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(170,5,utf8_decode("jmho"));
    
            $pdf->SetXY(35,260);
            $pdf->SetFont('Arial','',8);
            $pdf->MultiCell(170,5,utf8_decode("*AÑO{año}, CENTENARIO DEL NATALICIO DEL ESCRITOR MEXICANO Y UNIVERSAL, JUAN JOSÉ ARREOLA"));
    
            $pdf->SetXY(50,263);
            $pdf->SetFont('Arial','',8);
            $pdf->MultiCell(170,5,utf8_decode("Roberto Esperón No.. 1152, Col. De los Trabajadores, C.P 28067, Colima, Colima, México."));
    
            $pdf->SetXY(70,265.6);
            $pdf->SetFont('Arial','',8);
            $pdf->MultiCell(170,5,utf8_decode("Tel. +52(312) 31 22090, 31 31484, FAX +52(312) 31 62034"));
    
            $pdf->SetXY(70,269);
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(40,5,utf8_decode("www.colima-estado.gob.mx"),'B');
    
            $pdf->SetXY(110,268.8);
            $pdf->SetFont('Arial','B',8);
            $pdf->MultiCell(170,5,utf8_decode(", e-mail: dgpepe@hotmail.com"));
    
            $pdf->Output();


        }

        function notificaraTramiteSolicitado(){

            $pdf = new FPDF();
            $pdf->AddPage();
        
            $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
            $pdf->SetFont('Arial','B',10);
            $pdf->ln(35);
            $pdf->cell(134);
        
            // Información de cabecera parte derecha
        
            $pdf->Cell(30,5,utf8_decode('OFICIO No.{número de oficio}'),0,0,"R");
            $pdf->SetFont('Arial','',10);
        
            // $pdf->Cell(30,5,utf8_decode('SESP/SE/CGT/241/2018')); Número de oficio
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->cell(100);
            $pdf->Cell(30,5,'ASUNTO: {Asunto} {Fecha}',0,0,"R");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode('Se notifica tramite solicitado')); 
            $pdf->Ln();
            $pdf->cell(128);
            // $pdf->Cell(30,5,utf8_decode('trámite de ingreso al RNPSP')); Parte del asunto
            $pdf->Ln();
            $pdf->cell(107);
            // $pdf->Cell(30,5,utf8_decode('Colima, Colima , a 25 de Junio de 2018')); Lugar y fecha
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,5,utf8_decode('{nombre del DIRECTOR DEL CENTRO ESTATAL DE EVALUACIÓN Y CONTROL DE CONFIANZA},'));
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
            $pdf->MultiCell(185,5,utf8_decode("De conformidad a las atribuciones que me confiere el numeral 19,20 y además relativos a la ley del Sistema de Seguridad Pública para el Estado de Colima y en atención al oficio no.{número de oficio} del año en curso, en el cual se solicita realizar los movimientos de alta, como {Tipo de elemento}, en el Registro Nacional de Personal de Seguridad Pública (RNPSP) a los elementos que a continuación se enlistan:"));
        
            // Tabla 
        
            $pdf->Ln(10);
            $pdf->cell(10);

            $pdf->SetFont('Arial','B',10);
        
            // Headers
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Cell(8,7,"No.",1);
            $pdf->Cell(72,7,"Nombre",1);
            $pdf->Ln();

            $pdf->SetFont('Arial','',7);
            // Data
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln();
            $pdf->cell(10);
            $pdf->Cell(8,6,1,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Cell(8,6,4,1);
            $pdf->Cell(72,6,"",1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->cell(12);
            $pdf->SetXY(10,150);
            $pdf->MultiCell(180,5,utf8_decode('Al respecto hago de su conocimiento que se han llevado a cabo los trámites solicitados, adjunto constancias de dichos movimientos.'));
            $pdf->Ln(); 
            $pdf->Cell(30,5,utf8_decode('Sin otro particular, hago propicia la ocasión para hacerle llegar un cordial saludo.'));   
        
            $pdf->Ln(10);
            $pdf->SetFont('Arial','B',8);
         
            $pdf->Cell(0,5,utf8_decode('A T E N T A M E N T E'), 0, 0, "C");
            $pdf->Ln();
   
            $pdf->Cell(0,5,utf8_decode('{Cargo}'),0,0,"C");
            $pdf->Ln();

            $pdf->Ln(20);
 
            $pdf->Cell(0,5,utf8_decode('{nombre de quien firma}'), 0, 0, "C");
        
            $pdf->Ln();
            $pdf->Ln();
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(45,5,utf8_decode('C.c.p. {Nombre del encargado}'));
            $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',8); //Nombre del CP
            $pdf->Cell(45,5,utf8_decode('C.P{nombre del subcoordinador}'));
            $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Igual fin.'));;
            $pdf->Ln();
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10); //Nombre del sub coordinador
            $pdf->Cell(30,5,utf8_decode('                               '));
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(43);
            $pdf->Ln();
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('ARCHIVO.'));
            $pdf->Ln();
            $pdf->SetFont('Arial','',8); //Código del archivo
            $pdf->Cell(30,5,utf8_decode('                '));
        
            $pdf->Ln(5);
            $pdf->Cell(40);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,5,utf8_decode('"Año 2018. Centenario del natalicio del escritor mexicano y universal Juan José Arreola"'));
            $pdf->Ln();
        
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(55);
            $pdf->Cell(30,5,utf8_decode('Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública'));
            $pdf->Ln();
            $pdf->Cell(65);
            $pdf->Cell(30,5,utf8_decode('Colima, Colima, México. Tel. (312) 3162603'));
            $pdf->Ln();
            $pdf->Cell(60);
            $pdf->Cell(30,5,utf8_decode('https://www.secretariadoejecutivosesp.col.gob.mx'));
        
           $pdf->Output();
        }de

        // function Table(){
        //     $d = new FPDF('L');
        //     $d->AddPage();
        
        //     $d->Image($this->base."assets/images/logo.png",55,8,185,32);
        
        //     $d->SetFont('Arial','B',10);
        //     $d->ln(35);
        //     $d->cell(105);
        
        //     // Información de cabecera parte derecha
        //     $d->Cell(72,15,"");
        //     $d->Cell(30,15,utf8_decode('ASPIRANTES ENVIADOS A CEECC EN EL MES DE_______________________________'),0,0,"R");
        //     $d->SetFont('Arial','',10);
        
        //     // $d->Cell(30,5,utf8_decode('SESP/SE/CGT/241/2018')); Número de oficio
        //     $d->Ln();
        //     // Tabla 
        
        //     $d->Ln(10);
        //     $d->cell(10);
        
        //     // Headers
        //     $d->Cell(20,30,"Fecha",1,null,"C");
        //     $d->Cell(30,30,utf8_decode("Coorporación"),1,null,"C");
        //     $d->Cell(40,30,"Nombre",1,null,"C");
        //     $d->Cell(40,30,"CURP",1,null,"C");
        //     $d->Cell(40,30,"","T L R",null,"C");
        //     $d->Cell(40,30,"","T L R",null,"C");
        //     $d->Cell(20,30,"Perfil",1,null,"C");
        //     $d->Cell(30,30,"","T L R",null,"C");
        
        
        //     $d->SetXY(150,75);
        //     $d->Cell(40,5,utf8_decode("Fecha de examen")," L R",null,"C");
        //     $d->SetXY(150,80);
        //     $d->Cell(40,5,utf8_decode("de evaluación")," L R",null,"C");
        //     $d->SetXY(150,85);
        //     $d->Cell(40,5,utf8_decode("de control y")," L R",null,"C");
        //     $d->SetXY(150,90);
        //     $d->Cell(40,5,utf8_decode("confianza")," L R",null,"C");
        //     $d->SetXY(150,95);
        //     $d->Cell(40,5,utf8_decode("")," L R B",null,"C");
        
        //     $d->SetXY(190.2,75);
        //     $d->Cell(40,5,utf8_decode("Nivel de mando")," L R",null,"C");
        //     $d->SetXY(190.2,80);
        //     $d->Cell(40,5,utf8_decode("(operativo-administrativo,")," L R",null,"C");
        //     $d->SetXY(190.2,85);
        //     $d->Cell(40,5,utf8_decode("mando medio, mando")," L R",null,"C");
        //     $d->SetXY(190.2,90);
        //     $d->Cell(40,5,utf8_decode("superior o alto mando)")," L R",null,"C");
        //     $d->SetXY(190.2,95);
        //     $d->Cell(40,5,utf8_decode("")," L R B",null,"C");
        
        //     $d->SetXY(249.8,75);
        //     $d->Cell(30,5,utf8_decode("Fecha de inicio")," L R",null,"C");
        //     $d->SetXY(249.8,80);
        //     $d->Cell(30,5,utf8_decode("de curso de")," L R",null,"C");
        //     $d->SetXY(249.8,85);
        //     $d->Cell(30,5,utf8_decode("formación")," L R",null,"C");
        //     $d->SetXY(249.8,90);
        //     $d->Cell(30,5,utf8_decode("")," L R",null,"C");
        //     $d->SetXY(249.8,95);
        //     $d->Cell(30,5,utf8_decode("")," L R B",null,"C");
        
        //     //Data
        //     $d->SetXY(20,100);
        //     $d->Cell(20,10,"",1,null,"C");
        //     $d->Cell(30,10,utf8_decode(""),1,null,"C");
        //     $d->Cell(40,10,"",1,null,"C");
        //     $d->Cell(40,10,"",1,null,"C");
        //     $d->Cell(40,10,"",1,null,"C");
        //     $d->Cell(40,10,"",1,null,"C");
        //     $d->Cell(20,10,"",1,null,"C");
        //     $d->Cell(30,10,"",1,null,"C");
        //     $d->Output();
        // }
        //done

        // function aprobacionCursoInicial(){

    
        //     $pdf = new FPDF();
        //     $pdf->AddPage();
        
        //     $pdf->Image($this->base."assets/images/logo.png",10,8,185,32);
        
        //     $pdf->SetFont('Arial','B',10);
        //     $pdf->ln(35);
        //     $pdf->cell(105);
        
        //     // Información de cabecera parte derecha
        
        //     $pdf->Cell(30,5,utf8_decode('Oficio No.'),0,0,"R");
        //     $pdf->SetFont('Arial','',10);
        
        //     $pdf->Cell(30,5,utf8_decode('{Número de folio}'));
        //     $pdf->Ln();
        //     $pdf->SetFont('Arial','B',10);
        //     $pdf->cell(100);
        //     $pdf->Cell(30,5,'Asunto:',0,0,"R");
        //     $pdf->SetFont('Arial','',10);
        //     $pdf->Cell(30,5,utf8_decode('Solicitud de documentación'));
        //     $pdf->Ln();
        //     $pdf->cell(128);
        //     $pdf->Cell(30,5,utf8_decode('trámite de ingreso al RNPSP'));
        //     $pdf->Ln();
        //     $pdf->cell(90);
        //     $pdf->Cell(30,5,utf8_decode('{Fecha del sistema formato: Colima, Colima , a 25 de Junio de 2018}'));
        //     $pdf->Ln(10);
         
        
        //     // Datos del remitente
        //     $pdf->SetFont('Arial','B',10);
        
        //     $pdf->Cell(30,5,utf8_decode('{Nombre director}'));
        //     $pdf->Ln();
          
        //     // $pdf->Cell(30,5,utf8_decode('DIRECTOR DEL INSTITUTO DE FORMACIÓN,'));
        //     // $pdf->Ln();
        
        //     $pdf->Cell(30,5,utf8_decode('CAPACITACIÓN DEL INSTITUTO DE FORMACIÓN,'));
        //     $pdf->Ln();
            
        //     $pdf->Cell(30,5,utf8_decode('PRESENTE.'));
        //     $pdf->Ln(10);
        
        //     // Comunicado
        //     $pdf->SetFont('Arial','',10);
        
        
        //     $pdf->MultiCell(185,5,utf8_decode("Por instrucciones del Encargado del despacho del Secretariado Ejecutivo se Sistema Estatal de Seguridad Pública, el C.P. {Nombre del encargado del despacho}, y con fundamento en el numeral 20 y demás relativos a la Ley del Sistema de Seguridad Pública para el Estado de Colima, y con el objetivo de dar cumplimiento al requisito señalado en los artículos 39, apartado B, fracción VIII Y 88, apartado A, fracción VII, apartado B, fracción VI de la LGSNSP, para el ingreso de personal al Registro Nacional de Personal de Seguridad Pública (RNPSP), me permito solicitar la validación que certifique que el personal enlistado haya aprobado el curso de formación inicial."));
        
        //     $pdf->Ln(5);
        //     $pdf->SetFont('Arial','B',10);
        
        //     $pdf->Cell(30,5,utf8_decode('PEP'));
        
        //     // Tabla 
        
        //     $pdf->Ln(10);
        //     $pdf->cell(5);
        
        //     // Headers
        //     $pdf->Cell(30,7,"No.",1);
        //     $pdf->Cell(30,7,"Nombre",1);
        //     $pdf->Cell(30,7,"Perfil",1);
        
        //     $pdf->Cell(30,7,"No.",1);
        //     $pdf->Cell(30,7,"Nombre",1);
        //     $pdf->Cell(30,7,"Perfil",1);
        //     $pdf->Ln();
        
        //     $pdf->SetFont('Arial','',10);
        //     // Data
        //     $pdf->cell(5);
        //     $pdf->Cell(30,6,1,1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,4,1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Ln();
        //     $pdf->cell(5);
        //     $pdf->Cell(30,6,2,1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,5,1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Ln();
        //     $pdf->cell(5);
        //     $pdf->Cell(30,6,3,1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,6,1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Cell(30,6,"",1);
        //     $pdf->Ln(10);
        //     $pdf->SetFont('Arial','',10);
        //     $pdf->cell(12);
        //     $pdf->Cell(30,5,utf8_decode('Sin otro particular hago propicia la ocasión para hacerle llegar un cordial saludo'));
        
        
        //     $pdf->Ln(10);
        //     $pdf->SetFont('Arial','B',8);
        //     $pdf->cell(82);
        //     $pdf->Cell(30,5,utf8_decode('A T E N T A M E N T E'));
        //     $pdf->Ln();
        //     $pdf->cell(76);
        //     $pdf->Cell(30,5,utf8_decode('EL COORDINADOR GENERAL'));
        //     $pdf->Ln();
        //     $pdf->cell(78);
        //     $pdf->Cell(30,5,utf8_decode('DE ADMINISTRACIÓN DE'));
        //     $pdf->Ln();
        //     $pdf->cell(76);
        //     $pdf->Cell(30,5,utf8_decode('TECNOLOGÍAS DEL SESESP'));
        
        //     $pdf->Ln(25);
        //     $pdf->cell(68);
        //     $pdf->Cell(30,5,utf8_decode('{Nombre del coordinador general de TI}'));
        
        //     $pdf->Ln();
        
        //     $pdf->SetFont('Arial','',8);
        //     $pdf->Cell(30,5,utf8_decode('C.c.p.'));
        //     $pdf->Ln(10);
        //     $pdf->SetFont('Arial','B',6);
        //     $pdf->Cell(30,5,utf8_decode('{Nombre del encargado del depacho de SESP}'));
        //     $pdf->SetFont('Arial','',6);
        //     $pdf->Cell(18);
        //     $pdf->Cell(30,5,utf8_decode('Encargado del despacho del Secretariado Ejecutivo del SESP'));
        //     $pdf->Ln();
        //     $pdf->SetFont('Arial','B',6);
        //     $pdf->Cell(30,5,utf8_decode('{Nombre de subcoordinador de SI}'));
        //     $pdf->SetFont('Arial','',6);
        //     $pdf->Cell(18);
        //     $pdf->Cell(30,5,utf8_decode('Subcoordinador de Sistemas de Información del SESESP.- Igual fin.'));
        //     $pdf->Ln();
        //     $pdf->SetFont('Arial','',6);
        //     $pdf->Cell(30,5,utf8_decode('Archivo.'));
        //     $pdf->Ln();
        //     $pdf->SetFont('Arial','',6);
        //     $pdf->Cell(30,5,utf8_decode('JACHG/HHCHD/NAVA'));
            
        //     $pdf->Ln();
        //     $pdf->Ln(5);
        //     $pdf->Cell(52);
        //     $pdf->SetFont('Arial','',6);
        //     $pdf->Cell(30,5,utf8_decode('"Año 2018. Centenario del natalicio del escritor mexicano y universal Juan José Arreola"'));
        //     $pdf->Ln();
        //     $pdf->Image($this->base."assets/images/Cintillo.png",72,253,65,1);
        
        //     $pdf->SetFont('Arial','',6);
        //     $pdf->Cell(64);
        //     $pdf->Cell(30,4,utf8_decode('Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública'));
        //     $pdf->Ln();
        //     $pdf->Cell(57);
        //     $pdf->Cell(30,4,utf8_decode('C. Emilio Carranza Esq. Ejército Nacional S/N, Colonia Centro, C.P. 28000'));
        //     $pdf->Ln();
        //     $pdf->Cell(72);
        //     $pdf->Cell(30,4,utf8_decode('Colima, Colima, México. Tel. (312) 3162603'));
        //     $pdf->Ln();
        //     $pdf->Cell(69);
        //     $pdf->Cell(30,4,utf8_decode('https://www.secretariadoejecutivosesp.col.gob.mx'));
        
        
        //    $pdf->Output();
        
        // }
    }