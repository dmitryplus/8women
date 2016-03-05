<?php

class Pass 
{

	public static function generate(){
		
		// 657tw5f34gb - пример
	
		$char[] = 'abcdefghijkmnopqrstuvwxyz'; 	
		$char[] = '23456789';

		$rezult = '';

		for($i=0; $i<1; $i++){ $rezult .= $char[1]{ mt_rand(0, strlen($char[1])-1) }; }
		for($i=0; $i<1; $i++){ $rezult .= $char[0]{ mt_rand(0, strlen($char[0])-1) }; }
		for($i=0; $i<1; $i++){ $rezult .= $char[1]{ mt_rand(0, strlen($char[1])-1) }; }	
		for($i=0; $i<1; $i++){ $rezult .= $char[0]{ mt_rand(0, strlen($char[0])-1) }; }	
		for($i=0; $i<1; $i++){ $rezult .= $char[1]{ mt_rand(0, strlen($char[1])-1) }; }
		for($i=0; $i<1; $i++){ $rezult .= $char[0]{ mt_rand(0, strlen($char[0])-1) }; }
	
		return $rezult;

	}

}