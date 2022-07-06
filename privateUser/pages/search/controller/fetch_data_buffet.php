<?php

//fetch_data.php

require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

$item = new ItemOrcamento();
$buffet = new Buffet();

$condicoes = '';
$condicoes_string = '';
$output = '';


if (isset($_POST["servico"]) && in_array("Buffet", $_POST["servico"], true)) 
{

	if(isset($_POST['action'])){

		if (
			isset($_POST["minimum_price"], $_POST["maximum_price"])
			&& !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])
		) {
			$valorMinimo = $_POST["minimum_price"];
			$valorMaximo = $_POST["maximum_price"];
	
			$condicoes_string .= " valorBuffet BETWEEN '" . $valorMinimo . "' AND '" . $valorMaximo . "' ";
		}
	
	
		if(isset($_POST['cidade'])){
			$cidade = implode("', '", $_POST['cidade']);
			$condicoes_string .= " AND e.cidadeEmpresa IN ('" . $cidade . "') ";
		}
	
	
		if(isset($_POST['estado'])){
			$estado = implode("', '", $_POST['estado']);
			$condicoes_string .= " AND e.estadoEmpresa IN ('" . $estado . "') ";
		}
	
	
		$listBuffet = $buffet->searchBuffet($condicoes_string);


	}else{


		$listBuffet = $buffet->listarAll();

	}


}




if(isset($listBuffet) && !empty($listBuffet)){

	foreach($listBuffet as $row){

		$avgBuf = $item->avgAvaliacaoBuffet($row['idBuffet']);

		if ($avgBuf[0] == NULL) {
	
			$avgBuf = 0;
	
		} else {
	
			$avgBuf = $avgBuf[0];
			
		}
		

			$output .= 
					'<div class="pro">
						<img src="../../../privateWork/'.$row["fotoBuffet"].'">
						<div class="des">
							<span>'. $row['nomeEmpresa'].'</span>
							<h5>'. $row['nomeBuffet'].'</h5>


							<div class="star">
								<i>
									<p> '. $avgBuf .' <ion-icon name="star"></ion-icon> </p>
								</i>
							</div>
								
							<h4>R$'.$row["valorBuffet"].'</h4>

							<a href="../details/itenscard.php?servico=buffet&id='. $row['idBuffet'].'">
                                + Detalhes
                            </a>
						</div>
					</div>
				';
		

	}
}

echo $output;


