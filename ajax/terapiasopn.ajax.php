<?php

require_once "../controladores/optometriaNeonatos.controlador.php";
require_once "../modelos/optometriaNeonatos.modelo.php";

class AjaxTerapias{



	/*=============================================
	ACTIVAR PAGO
	=============================================*/	

	public $activarPago;
	public $sucursal;
	public $activarId;


	public function ajaxActivarPago(){

		$tabla = "terapia_optometria_neonatos";

		$item1 = "pagado";
		$valor1 = $this->activarPago;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloOptometriaNeonatos::mdlActualizarPago($tabla, $item1, $valor1, $item2, $valor2);

	}

	public function ajaxCambiarSucursal(){

		$tabla = "terapia_optometria_neonatos";

		$item1 = "sucursal";
		$valor1 = $this->sucursal;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloOptometriaNeonatos::mdlActualizarPago($tabla, $item1, $valor1, $item2, $valor2);

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



/*=============================================
SELECCIONAR SUCURSAL
=============================================*/	

if(isset($_POST["cambiarSucursal"])){

	$activarPago = new AjaxTerapias();
	$activarPago -> sucursal  = $_POST["sucursal_id"];
	$activarPago -> activarId = $_POST["activarId"];
	$activarPago -> ajaxCambiarSucursal();

}