<?php

/*
Ecrire une fonction qui prend en paramètre un tableau d’entier (positif & négatif) et retourne la valeur la plus proche de zéro.

*/

function procheDeZero($tab){
	//$pos = PHP_INT_MIN;
	$pos = $tab[0];

	for ($i = 1; $i < count($tab); $i++) { 
		if( abs($tab[$i]) < abs($pos) ){
			$pos = $tab[$i];
		}
	}

	return $pos;
}

$tab = [5, -11, 117, 8, 9, 9, -2, 1, -50];

function dexiemePlusGrande($tab){
	if( count($tab) >= 2 ){
		$plusGrd = 0;
		$deuxiemeGrd = 0;

		for( $i = 0; $i < count($tab); $i++ ){
			if( $tab[$i] > $plusGrd ){
				$deuxiemeGrd = $plusGrd;
				$plusGrd = $tab[$i];
			}

			if( $deuxiemeGrd < $tab[$i] && $plusGrd > $tab[$i] ){
				$deuxiemeGrd = $tab[$i];
			}

		}

		return $deuxiemeGrd;
	}
}

/*
Ecrire une fonction qui prend en paramètre un tableau d’entier et qui renvoie la deuxième plus grande valeur d’un tableau.
*/

function dexiemePlusGrande2($tab){
	if( count($tab) >= 2 ){
		rsort($tab);
		return $tab[1];
	}
}


echo dexiemePlusGrande($tab);