    <?php
    /*
    * El ayuntamiento de Córdoba quiere almacenar la siguiente información sobre
    * infracciones de tráfico por estacionamiento en zona azul: Matricula,
    * FechaHoraDenuncia,Motivo, Multa. Las sanciones previstas son:
    * Falta recibo: 100 €.
    * Excede tiempo: 30 €
    * Diseñar una estructura para guardar esta información y mostrar un informe
    * mensual con el detalle de las multas y el importe total.

    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    $multaFaltaRecibo = 100;
    $multaExcedeTiempo = 30;
    //array con los datos
    $multas[] = array("matricula" => "9425AW","fecha"=>"01/03/17","hora"=>"21:00","motivo"=>"falta","multa"=>100);
    $multas[] = array("matricula" => "2478AR","fecha"=>"11/02/17","hora"=>"11:00","motivo"=>"tiempo","multa"=>30);
    $multas[] = array("matricula" => "9445BW","fecha"=>"21/04/17","hora"=>"22:00","motivo"=>"falta","multa"=>100);
    $multas[] = array("matricula" => "9665AW","fecha"=>"05/07/17","hora"=>"11:00","motivo"=>"tiempo","multa"=>30);
    $multas[] = array("matricula" => "6845AA","fecha"=>"09/07/17","hora"=>"20:00","motivo"=>"tiempo","multa"=>30);
    $multas[] = array("matricula" => "3225CD","fecha"=>"11/09/17","hora"=>"22:00","motivo"=>"falta","multa"=>100);
    $multas[] = array("matricula" => "1445BW","fecha"=>"22/05/17","hora"=>"23:00","motivo"=>"falta","multa"=>100);

    if((!isset($_POST['total']) && !isset($_POST['mostrarMes']))){

      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
      echo '<select name="mes">
        <option value="1">Enero</option><option value="2">Febrero</option>
        <option value="3">Marzo</option><option value="4">Abril</option>
        <option value="5">Mayo</option><option value="6">Junio</option>
        <option value="7">Julio</option><option value="8">Agosto</option>
        <option value="9">Septiembre</option><option value="10">Octubre</option>
        <option value="11">Noviembre</option><option value="12">Diciembre</option>
      </select> <input type="submit" value="mostrar mes" name="mostrarMes"  />
      </select> <input type="submit" value="total" name="total"  /></form>';

    }elseif((isset($_POST['total']) && !isset($_POST['mostrarMes']))){
      $total=0;
      echo'<h1>Mostrando Histórico total</h1>
      <table style="border:1px solid black; border-collapse:collapse;margin:10px;">';
      echo'<thead><th>Matrícula</th><th>Fecha</th><th>Hora</th><th>Motivo</th>
      <th style="border-bottom: 1px solid black;">Importe</th></thead><tbody>';
      foreach ($multas as $multa => $datos){
          $total= $total+$datos["multa"];
          echo "<tr>";
          foreach ($datos as $dato) {
            echo "<td>" .$dato. "</td>";
          }
          echo "</tr>";
      }echo '</tbody></table>';
      echo '<p>Total de Importe: '.$total.'</p>';
      echo'<p><a href="../php/multas.php">Consultar</a>&nbspotra vez</p>';

    }elseif((!isset($_POST['total']) && isset($_POST['mostrarMes']))){
      $total=0;
      $mes = $_POST["mes"];
      echo'<h1>Mostrando Histórico total</h1>
      <table style="border:1px solid black; border-collapse:collapse;margin:10px;">';
      echo'<thead><th style="border-bottom: 1px solid black;">Matrícula</th>
      <th style="border-bottom: 1px solid black;">Fecha</th>
      <th style="border-bottom: 1px solid black;">Hora</th>
      <th style="border-bottom: 1px solid black;">Motivo</th>
      <th style="border-bottom: 1px solid black;">Importe</th></thead><tbody>';

      foreach ($multas as $multa => $datos){

          $fecha = $datos["fecha"];

          if(comprobarMes($mes,$fecha)){
            $total= $total+$datos["multa"];
            echo "<tr>";
            foreach ($datos as $dato) {
              echo "<td>" .$dato. "</td>";
            }
            echo "</tr>";
          }

      }echo '</tbody></table>';
      echo '<p>Total de Importe: '.$total.'</p>';
      echo'<p><a href="../php/main.php?page=multas">Consultar</a>&nbspotra vez</p>';
    }


      //see_code button
      if(isset($_POST['ver_codigo'])){
      verCodigo(__FILE__);
    }

    echo '<div style="clear:both;">';
    botonVer();
    echo '</div>';

    function comprobarMes($mes,$fecha){ //
      $mesDeFecha= substr($fecha, 3,2);
      if($mesDeFecha == $mes){
        return true;
      }else{
        return false;
      }
    }
    ?>
