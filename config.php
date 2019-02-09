;<?php die("[ ACCESO DENEGADO ]"); ?>
;Autor: Miguel Angel Rueda Aguilar
;Fecha Creación: 21-12-2018
;Descripción: Archivo de configuraciones del sistema

[general] ;Sección general
proyect_name = "RNPSP" ;En caso de root se deja en blanco
title = "Sistema Integral de Seguridad Pública"
environment = development ;Se define en development o production
[databaseDefault] ;Configuración de base de datos
dbdriver = "sqlsrv" ;mysqli / mssql / sqlsrv
hostname = "184.168.194.53"
username = "zzhpregpersc4"
password = "h705m!lD"
database = "zzhpregpersonalc4"
[sendMail] ;Configuración de correo electrónico
protocol = ""
smtp_host = ""
smtp_user = ""
smtp_pass = ""
smtp_port = ""
smtp_type = ""
smtp_debug = ""
mailtype = ""
[reCaptcha]
site_key = "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
secret_key = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe"