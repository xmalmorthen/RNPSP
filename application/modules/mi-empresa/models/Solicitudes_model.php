<?php defined('BASEPATH') or exit('No direct script access allowed');
class Solicitudes_model extends CI_Model
{
    public $bd;
    function __construct()
    {
        parent::__construct();
        $this->config->load('database');
        $ciapacov = $this->config->item('ciapacov');
        $this->bd = $this->load->database($ciapacov, true);
    }

    function getListado()
    {
        $query = <<<EOT
        SELECT
        D.id_Solicitud as idSolicitud,
        D.fecha_Solicitud as fechaSolicitud,
        D.numero_Contrato  as numeroContrato,
        D.id_Estatus as id_Estatus,
        (select descripcion_Estatus from ca_Estatus WHERE id_Estatus = D.id_Estatus limit 1) as estatus,
        (SELECT fecha FROM re_Sol_Doc_Act WHERE id_Actividad = (SELECT id_Actividad FROM ca_Actividades WHERE descripcion_Actividad = ' Visita Tecnica ')AND id_Solicitud = D.id_Solicitud) as fechaInspeccion,
        (SELECT fechaVencimiento FROM ca_Documentos WHERE id_Documento = (SELECT id_Documento FROM re_Sol_Doc_Act WHERE id_Actividad = (SELECT id_Actividad FROM ca_Actividades WHERE descripcion_Actividad = ' Dictamen ') AND id_Solicitud = D.id_Solicitud )) as fechaVencimiento,
    
        (SELECT CONCAT_WS(SPACE(1),DX.nombre,DX.ap_Paterno,DX.ap_Materno) FROM bd_MiEmpresa.re_Solicitudes_Tramites AS A INNER JOIN bd_MiEmpresa.ca_Solicitudes AS B ON A.id_Solicitud = B.id_Solicitud LEFT JOIN bd_MiEmpresa.ca_Usuarios AS C ON C.id_Usuario = B.id_Usuario LEFT JOIN bd_MiEmpresa.ca_Personas AS DX ON DX.id_Usuario = C.id_Usuario WHERE A.claveSolicitudEnDependencia = D.id_Solicitud AND A.id_Tramite = 1) as nombre,
        now() as FechaProcesamiento,
        1 as Vigente,
        D.numero_Solicitud
    
                    FROM (SELECT B.id_Solicitud, fecha_Solicitud, clave_Catastral, numero_Contrato, adeudo_Contrato,B.id_Estatus,numero_Solicitud
                                FROM 
                                            (SELECT id_Solicitud, id_Estatus
                                                        FROM (SELECT *
                                                                    FROM re_Solicitudes_Estatus 
                                                                    WHERE id_Estatus IN (1,2,4,5,6,7,8,9,10)
                                                                    ORDER BY consecutivo DESC) AS A
                                                                    
                                                        GROUP BY id_Solicitud) AS B
                                         
                                INNER JOIN ca_Solicitudes ON B.id_Solicitud = ca_Solicitudes.id_Solicitud WHERE id_Tramite = 1 
                                             
                             ) AS D;'
EOT;
utils::pre($query);
        $result = ($query->num_rows() > 0) ? $query->result_array() : false;
        $query->free_result();
        return $result;
    }
    function __destruct()
    {
        $this->bd->close();
    }



}