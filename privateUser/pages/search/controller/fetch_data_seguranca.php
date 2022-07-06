<?php

//fetch_data.php

require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

$item = new ItemOrcamento();
$seguranca = new Seguranca();

$condicoes = '';
$condicoes_string = '';
$output = '';

if (isset($_POST["servico"]) && in_array("Segurança", $_POST["servico"], true)) 
{


	if (isset($_POST['action'])) {

		if (
			isset($_POST["minimum_price"], $_POST["maximum_price"])
			&& !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])
		) {
			$valorMinimo = $_POST["minimum_price"];
			$valorMaximo = $_POST["maximum_price"];

			$condicoes_string .= " valorSeguranca BETWEEN '" . $valorMinimo . "' AND '" . $valorMaximo . "' ";
		}


		if(isset($_POST['cidade'])){
			$cidade = implode("', '", $_POST['cidade']);
			$condicoes_string .= " AND e.cidadeEmpresa IN ('" . $cidade . "') ";
		}


		if(isset($_POST['estado'])){
			$estado = implode("', '", $_POST['estado']);
			$condicoes_string .= " AND e.estadoEmpresa IN ('" . $estado . "') ";
		}

		$listSeguranca = $seguranca->searchSeguranca($condicoes_string);

	}else{

		$listSeguranca = $seguranca->listarAll();

	}

}


if(isset($listSeguranca) && !empty($listSeguranca)){

	foreach($listSeguranca as $row){

		$avgSeguranca = $item->avgAvaliacaoSeguranca($row['idSeguranca']);

		if ($avgSeguranca[0] == NULL) {
	
			$avgSeguranca = 0;
	
		} else {
	
			$avgSeguranca = $avgSeguranca[0];
			
		}

	$output .= 
			'<div class="pro">
				<img src="../../../privateWork/'.$row["fotoSeguranca"].'">
				<div class="des">
					<h5>'. $row['descSeguranca'].'</h5>
					<span>'. $row['nomeEmpresa'].'</span>

					<div class="star">
						<i>
							<p> '. $avgSeguranca .' <ion-icon name="star"></ion-icon> </p>
						</i>
					</div>
						
					<h4>R$'.$row["valorSeguranca"].'</h4>

					<a href="../details/itenscard.php?servico=seguranca&id='. $row['idSeguranca'].'">
						+ Detalhes
					</a>

				</div>
			</div>
		';
	}
}

// echo "<pre>";
// if(isset($listSeguranca)){
// 	print_r($listSeguranca);
// }
// echo "</pre>";

echo $output;

