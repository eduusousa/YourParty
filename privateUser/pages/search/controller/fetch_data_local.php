<?php

//fetch_data.php

require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
require_once '/xampp/htdocs/yourParty/Classes/Local.php';
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

$item = new ItemOrcamento();
$local = new Local();

$condicoes = '';
$condicoes_string = '';
$output = '';


if (isset($_POST["servico"]) && in_array("Local", $_POST["servico"], true)) 
{

	if (isset($_POST['action'])) {

		if (
			isset($_POST["minimum_price"], $_POST["maximum_price"])
			&& !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])
		) {
			$valorMinimo = $_POST["minimum_price"];
			$valorMaximo = $_POST["maximum_price"];

			$condicoes_string .= " valorLocal BETWEEN '" . $valorMinimo . "' AND '" . $valorMaximo . "' ";
		}


		if(isset($_POST['cidade'])){
			$cidade = implode("', '", $_POST['cidade']);
			$condicoes_string .= " AND e.cidadeEmpresa IN ('" . $cidade . "') ";
		}


		if(isset($_POST['estado'])){
			$estado = implode("', '", $_POST['estado']);
			$condicoes_string .= " AND e.estadoEmpresa IN ('" . $estado . "') ";
		}


		if(isset($_POST['cidadeSalao'])){
			$estado = implode("', '", $_POST['cidadeSalao']);
			$condicoes_string .= " AND cidadeLocal IN ('" . $estado . "') ";
		}


		if(isset($_POST['estadoSalao'])){
			$estado = implode("', '", $_POST['estadoSalao']);
			$condicoes_string .= " AND estadoLocal IN ('" . $estado . "') ";
		}

		$listLocal = $local->searchLocal($condicoes_string);

	}else{

		$listLocal = $local->listarAll();

	}

}


if(isset($listLocal) && !empty($listLocal)){

	foreach($listLocal as $row){

		$avgLocal = $item->avgAvaliacaoLocal($row['idLocal']);

		if ($avgLocal[0] == NULL) {
	
			$avgLocal = 0;
	
		} else {
	
			$avgLocal = $avgLocal[0];
			
		}

	$output .= 
			'<div class="pro">
				<img src="../../../privateWork/'.$row["fotoLocal"].'">
				<div class="des">
					<span>'. $row['nomeEmpresa'].'</span>
					<h5>'. $row['nomeLocal'].'</h5>

					<div class="star">
						<i>
							<p> '. $avgLocal .' <ion-icon name="star"></ion-icon> </p>
						</i>
					</div>
						
					<h4>R$'.$row["valorLocal"].'</h4>

					<a href="../details/itenscard.php?servico=local&id='. $row['idLocal'].'">
						+ Detalhes
					</a>

				</div>
			</div>
		';
	}
}

// echo "<pre>";
// if(isset($listLocal)){
// 	print_r($listLocal);
// }
// echo "</pre>";

echo $output;

