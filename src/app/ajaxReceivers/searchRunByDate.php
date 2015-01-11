<?php

require_once '../model/persistence/Dao.class.php';
require_once '../util/Queries.php';

$date = date_create_from_format('d/m/Y', filter_input(INPUT_POST, 'date'));

$dao = new Dao();
session_start();

$params['date'] = $date->format('Y-m-d');
$params['runner_id'] = $_SESSION['id'];

$runs = $dao->getListResultOfNamedQueryWithParameters(Queries::GET_RUNS_BY_DATE, $params);


if(empty($runs)){
    echo "<div class='col-xs-12'>";
        echo "<h4 class='center-text'>Não foram encontrados resultados para a data informada</h4>";
    echo '</div>';
}
else{
    if(count($runs) === 1){
        echo "<h4 id='result-count'>Resultado: <span>". count($runs) . "</span></h4>";
    }else{
        echo "<h4 id='result-count'>Resultados: <span>". count($runs) . "</span></h4>";
    }
    
    foreach ($runs as $run){
        echo "<div class='result table-responsive'>";
            echo "<table class='table table-bordered table-striped'>";
                echo "<tbody>";
                        echo "<tr>";
                            echo "<td>Data: </td>";
                            echo "<td>".$run->getFullDate()."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Distancia: </td>";
                            echo "<td>".$run->getDistance()." km</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Tempo: </td>";
                            echo "<td>".$run->getFullTime()."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Velocidade Média</td>";
                            echo "<td>".$run->getAvgSpeed(). " Km/h</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Rítimo</td>";
                            echo "<td>".$run->getPace()." min/km</td>";
                        echo "</tr>";
                echo "</tbody>";
            echo "</table>";
            if($run->getNotes() != null && $run->getNotes() !=''){
                echo "<div class='notes'>";
                    echo "<h4>Observações: <small>".$run->getNotes()."</small></h4>";
                echo "</div>";
            }
        echo "</div>";
    }
}