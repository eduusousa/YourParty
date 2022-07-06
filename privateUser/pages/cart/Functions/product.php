<?php 

	require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';

function getProducts($pdo){
	$sql = "SELECT idBuffet,nomeBuffet,descricaoBuffet,valorBuffet,fotoBuffet,nomeEmpresa FROM tbbuffet 
	INNER JOIN tbempresa ON (tbbuffet.idEmpresa = tbempresa.idEmpresa)";

	$stmt = $pdo->prepare($sql);

	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getProductsByIds($pdo, $ids) {
	try{

		$sql = "SELECT * FROM tbBuffet WHERE idBuffet IN ($ids) ";
	
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	
		return $stmt->fetchAll(PDO::FETCH_ASSOC);


	}catch(PDOException $e){
		return $e->getMessage();
	}
}


function getLocalByIds($pdo, $ids){

	try{
		$stmt = $pdo->prepare("SELECT * FROM tbLocal WHERE idLocal IN ($ids) ");
		$stmt->execute();
	
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}catch(PDOException $e){
		return $e->getMessage();
	}


}


function getDecoracaoByIds($pdo, $ids){

	try{
		$stmt = $pdo->prepare("SELECT * FROM tbDecoracao WHERE idDecoracao IN ($ids)");
	
		$stmt->execute();
	
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}catch(PDOException $e){
		return $e->getMessage();
	}

}

function getSegurancaByIds($pdo, $ids){

	try{
		$stmt = $pdo->prepare("SELECT * FROM tbSeguranca WHERE idSeguranca IN ($ids)");
	
		$stmt->execute();
	
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}catch(PDOException $e){
		return $e->getMessage();
	}



}
