terapiasora.ajax.php
<?php

require_once "../controladores/ortopticaAdultos.controlador.php";
require_once "../modelos/ortopticaAdultos.modelo.php";

class AjaxTerapias{



	/*=============================================
	ACTIVAR PAGO
	=============================================*/	

	public $activarPago;
	public $activarId;


	public function ajaxActivarPago(){

		$tabla = "terapia_ortoptica_adultos";

		$item1 = "pagado";
		$valor1 = $this->activarPago;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloOrtopticaAdultos::mdlActualizarPago($tabla, $item1, $valor1, $item2, $valor2);

	}

}


/*=============================================
ACTIVAR PAGO
=============================================*/	

if(isset($_POST["activarPago"])){

	$activarPago = new AjaxTerapias();
	$activarPago -> activarPago = $_POST["activarPago"];
	$activarPago -> activarId = $_POST["activarId"];
	$activarPago -> ajaxActivarPago();

}

