<?php

if ( ! function_exists('calcularCustoLigacao'))
{
	/**
	@param $tempo - tempo da ligação
	@param $custo - custo do minuto da ligação
	*/
	function calcularCustoLigacao($tempo,$custo)
	{
		// Converter o tempo em segundos
		$partes = explode(':', $tempo);
		$segundos = $partes[0] * 3600 + $partes[1] * 60 + $partes[2];
		
		// Converter o custo da ligação de minutos para segundos
		$custoSegundos = $custo / 60;

		// Calcular
		$resultado = $segundos * $custoSegundos;

		return $resultado;
	}	
}
