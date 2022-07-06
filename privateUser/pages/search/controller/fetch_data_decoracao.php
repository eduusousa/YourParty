<?php

//fetch_data.php

require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

$item = new ItemOrcamento();
$decoracao = new Decoracao();

$condicoes = '';
$condicoes_string = '';
$output = '';



if (isset($_POST["servico"]) && in_array("Decoração", $_POST["servico"], true)) 
{

	if (isset($_POST['action'])) {

		if (
			isset($_POST["minimum_price"], $_POST["maximum_price"])
			&& !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])
		) {
			$valorMinimo = $_POST["minimum_price"];
			$valorMaximo = $_POST["maximum_price"];

			$condicoes_string .= " valorDecoracao BETWEEN '" . $valorMinimo . "' AND '" . $valorMaximo . "' ";
		}


		if(isset($_POST['cidade'])){
			$cidade = implode("', '", $_POST['cidade']);
			$condicoes_string .= " AND e.cidadeEmpresa IN ('" . $cidade . "') ";
		}


		if(isset($_POST['estado'])){
			$estado = implode("', '", $_POST['estado']);
			$condicoes_string .= " AND e.estadoEmpresa IN ('" . $estado . "') ";
		}

		$listDecoracao = $decoracao->searchDecoracao($condicoes_string);

	}else{

		$listDecoracao = $decoracao->listarAll();

	}

}


if(isset($listDecoracao) && !empty($listDecoracao)){

	foreach($listDecoracao as $row){


		$avgDecoracao = $item->avgAvaliacaoDecoracao($row['idDecoracao']);

		if ($avgDecoracao[0] == NULL) {

			$avgDecoracao = 0;

		} else {

			$avgDecoracao = $avgDecoracao[0];

		}
		
		$output .= 
			'<div class="pro">
				<img src="../../../privateWork/'.$row["fotoDecoracao"].'">
				<div class="des">
					<span>'. $row['nomeEmpresa'].'</span>
					<h5>'. $row['nomeDecoracao'].'</h5>

					<div class="star">
						<i>
							<p> '. $avgDecoracao .' <ion-icon name="star"></ion-icon> </p>
						</i>
					</div>
						
					<h4>R$'.$row["valorDecoracao"].'</h4>

					<a href="../details/itenscard.php?servico=decoracao&id='. $row['idDecoracao'].'">
                        + Detalhes
                    </a>
				</div>
			</div>
		';
	}
}


// echo "<pre>";
// if(isset($listDecoracao)){
// 	print_r($listDecoracao);
// }
// echo "</pre>";

echo $output;

