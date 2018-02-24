<?php
function verCodigo($file){

	highlight_file($file);

	echo("<form method='post'>
			<input type='submit' name='Volver' target='blank'
			name='Submit' value='Volver'/>
			</form>");

}

function botonVer(){

	echo("<form method='post'> <input type='submit' name='ver_codigo' target='blank' name='Submit' value='Ver Codigo'/>
			</form>");
}
?>
