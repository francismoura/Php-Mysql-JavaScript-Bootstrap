<?php

require_once('../model/User.php');

$usuario = new User();
$todosUsuarios = $usuario->findAll();

$output =
    '
        <table id="user_data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="1%">id</th>
                    <th width="15%">Nome</th>
                </tr>
            </thead>
            <tbody>
        
    '
;

if (!empty($todosUsuarios)) {
    foreach ($todosUsuarios as $value) {
        $output .=
            '
                <tr>
                    <td>' . $value['id'] . '</td>
                    <td>' . $value['nome'] . '</td>
                </tr>    
            '
        ;
    }
} else {
    $output .=
        '     
            <td colspan="4" align="center">Data not found</td>
                
        '
    ;
}

$output .=
    '   
            </tbody>
        </table>
    '
;

echo $output;