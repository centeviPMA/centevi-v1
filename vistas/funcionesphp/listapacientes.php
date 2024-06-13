<?php
    $item = null;
    $valor = null;

    $pagina_seleccionada = 1;
    $txt_buscar = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pagina_seleccionada = isset($_POST['page']) ? $_POST['page'] : 1;

        $txt_buscar = isset($_POST['txt_buscar']) ? $_POST['txt_buscar'] == "none"?"" : $_POST['txt_buscar'] :"";
    }
    
    $rpta_listado_pacientes_paginate = ControladorPacientes::ctrMostrarListadoPacientesPaginate($item, $valor, $pagina_seleccionada, $txt_buscar);
    
    echo json_encode([
        'success' => true, 
        'data' => $rpta_listado_pacientes_paginate['data'], 
        'pagina_seleccionada' => $pagina_seleccionada,
        'txt_filtro' => $rpta_listado_pacientes_paginate['txt_filtro'],
        'total_datos' => $rpta_listado_pacientes_paginate['total_datos']
    ]);
?>