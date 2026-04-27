<?php

class Validacao{

    public static function validar($regras, $dados){
        $erros = [];

        foreach ($regras as $campo => $regrasCampo) {

            $valor = trim($dados[$campo] ?? '');

            foreach ($regrasCampo as $regra){

                if($regra === 'required' && $valor === ''){
                    $erros[$campo][] = "O campo $campo é obrigatorio";
                }
                if($regra == 'email' && !filter_var($valor, FILTER_VALIDATE_EMAIL)){
                    $erros[$campo][] = "O campo $campo deve ser um email válido";
                }
                if (str_starts_with($regra, 'min:')){
                    $min = explode(':', $regra)[1];

                    if(strlen($valor) < $min){
                        $erros[$campo][] = "O campo $campo deve ter no mínimo $min caracteres";
                    }
                }

            }

        }
        return $erros;
    }

}