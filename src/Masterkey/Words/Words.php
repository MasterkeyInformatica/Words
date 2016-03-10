<?php namespace Masterkey\Words;
    /*
     *              ________________________________________
     *     ________|                                        |_______
     *     \       |    Busca de CEP - Site dos Correios    |      /
     *      \      | Copyright © 2016 Masterkey Informática |     /
     *      /      |________________________________________|     \
     *     /__________)                                 (__________\
     *
     * Os direitos acima e esta permissão informam que devem ser incluídas
     * em todas as cópias ou substanciais porções do software
     * =======================================================================
     * O SOFTWARE É FORNECIDO "COMO ESTÁ". TODAS AS MODIFICAÇÕES, SEJAM ELAS
     * INCLUSÕES, EXCLUSÕES OU CORREÇÕES DEVEM SER FEITAS EM CONFORMIDADE E COM
     * A PERMISSÃO DO AUTOR DO SOFTWARE. CASO HAJA QUALQUER ALTERAÇÃO NÃO
     * AUTORIZADA PELO O AUTOR, O MESMO NÃO SE RESPONSABILIZA POR QUALQUER FALHA
     * OU PERDA DE DADOS, DECORRENTE DE ERROS DE SOFTWARE
     * =======================================================================
     * original filename  : Words.php
     * author             : Matheus Lopes Santos (@devMatheusLopes)
     * email              : fale_com_lopez@hotmail.com
     * =======================================================================
     */

    /**
     * Words
     *
     * Classe desenvolvida para realizar operações diversas com palavras  e strings
     * diversas
     *
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @version 1.0.2
     * @since   10/03/2016
     */
    class Words
    {
        /**
         * Remove os acentos e caracteres especiais de uma string. Ainda pode
         * devolvê-la em UpperCase, caso o usuário desejar
         *
         * @since   1.0.2 - 10/03/2016
         * @param   string  $string
         * @return  string
         */
        public static function removeAcentos($string, $upper = false)
        {
            // Decodifica a string para que a função funcione corretamente
			$texto = utf8_decode($string);

            // Recebe a string e força a mesma para minúsculo
            $string = strtolower($string);

			// Código ASCII das vogais
			$ascii['a'] = range(224, 230);
			$ascii['e'] = range(232, 235);
			$ascii['i'] = range(236, 239);
			$ascii['o'] = array_merge(range(242, 246), array(240, 248));
			$ascii['u'] = range(249, 252);

			// Código ASCII dos outros caracteres
			$ascii['b'] = [223];
			$ascii['c'] = [231];
			$ascii['d'] = [208];
			$ascii['n'] = [241];
			$ascii['y'] = [253, 255];

            // Realiza uma varredura na string e nos caracteres ASCII, para que
            // seja montada a matriz de caracteres especiais
			foreach ($ascii as $key=>$item) {
				$acentos = '';

				foreach ($item as $codigo) {
					$acentos .= chr($codigo);
				}

				$troca[$key] = '/['.$acentos.']/i';
			}

			// Retira os acentos e caracteres especiais
			$string = preg_replace(array_values($troca), array_keys($troca), $texto);

            // Retorna a string comum ou em UpperCase
            return ($upper) ? strtoupper($string) : $string;
        }
    }
