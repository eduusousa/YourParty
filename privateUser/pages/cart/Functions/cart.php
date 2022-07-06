<?php 

if(!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}

function addCart($id, $product) {
	if(!isset($_SESSION['carrinho'][$product])){ 
		$_SESSION['carrinho'][$product] = ['id' => $id];

		
	}else if(isset($_SESSION['carrinho'][$product])){ 
		$_SESSION['carrinho'][$product] = ['id' => $id];
	}
}

function deleteCart($id, $product) {
	if(isset($_SESSION['carrinho'][$product])) { 
		unset($_SESSION['carrinho'][$product]);
	}
}


function getContentCart($pdo) {
	
	$results = array();

	//---------|| SE EXISTER BUFFET ||------------------
	if(isset($_SESSION['carrinho']['buffet'])) {
		$cartBuffet = $_SESSION['carrinho']['buffet'];

		if(isset($cartBuffet["id"]) && !empty($cartBuffet["id"]) ){
			$products = getProductsByIds($pdo, $cartBuffet["id"]);
		}


		if(isset($products) && !empty($products)){

			foreach($products as $product) {
	
				$results[]['buffet'] = array(
								  'id' => $product['idBuffet'],
								  'nome' => $product['nomeBuffet'],
								  'valor' => $product['valorBuffet'],
								  'subtotal' => $product['valorBuffet'],
								  'product' => 'buffet',
							);
			}

		}

	}



	// ---------|| SE EXISTER LOCAL ||------------------
	if(isset($_SESSION['carrinho']['local'])){
		$cartLocal = $_SESSION['carrinho']['local'];


		if(isset($cartLocal["id"]) && !empty($cartLocal["id"])){
			$localList = getLocalByIds($pdo, $cartLocal["id"]);
		}

		if(isset($localList) && !empty($localList)){

			foreach($localList as $local){
	
				$results[]['local'] = array(
									'id' => $local['idLocal'],
									'nome' => $local['nomeLocal'],
									'valor' => $local['valorLocal'],
									'subtotal' => $local['valorLocal'],
									'product' => 'local',
							);
			}


		}
	}

	//---------|| SE EXISTER DECORAÇÃO ||------------------
	if(isset($_SESSION['carrinho']['decoracao'])){
		$cartDec = $_SESSION['carrinho']['decoracao'];

		if(isset($cartDec["id"]) && !empty($cartDec["id"])){
			$decList = getDecoracaoByIds($pdo, $cartDec["id"]);
		}

		if(isset($decList) && !empty($decList)){

			foreach($decList as $dec){
	
				$results[]['decoracao'] = array(
										'id' => $dec['idDecoracao'],
										'nome' => $dec['nomeDecoracao'],
										'valor' => $dec['valorDecoracao'],
										'subtotal' => $dec['valorDecoracao'],
										'product' => 'decoracao',
				);
			}
		}
	}


	if(isset($_SESSION['carrinho']['seguranca'])){
		$cartSeg = $_SESSION['carrinho']['seguranca'];

		if(isset($cartSeg["id"]) && !empty($cartSeg["id"])){
			$segList = getSegurancaByIds($pdo, $cartSeg["id"]);
		}

		if(isset($segList) && !empty($segList)){

			foreach($segList as $seg){

				$results[]['seguranca'] = array(
									'id' => $seg['idSeguranca'],
									'nome' => $seg['descSeguranca'],
									'valor' => $seg['valorSeguranca'],
									'subtotal' => $seg['valorSeguranca'],
									'product' => 'seguranca',
				);
			}
		}

	}
	
	return $results;
}

function getTotalCart($pdo) {
	$total = 0;

	foreach(getContentCart($pdo) as $i => $product) {
		foreach($product as $value){
			$total += $value['subtotal'];
		}
	} 
	return $total;
}

