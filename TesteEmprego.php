<?php
/*
 *Elabore um programa para listar todos os números multiplos de três de um intervalo 
 *fechado a esquerda e aberto a direita difinido pelo utilizador este entervalo deve ser validado
 *
*/

class TesteEmprego
{

    protected int $xEsquerda;
    protected int $xDireita;

    public function __construct(int $xEsquerda, int $xDireita)
    {
        /* Aqui estou fazendo uma normalização do numero, para garantir sempre que eu vou começar com um XEsquerda com multiplo de 3
        * Exemplo, o usuario coloca 2 e 21. Eu transformo o intervalo para 3 e 21. Pois a premicia era que o intervalo a esquerda era fechado
        */
        $this->xEsquerda = $this->encontrarPrimeiroMultiploDeTresAposUmNumero($xEsquerda);
        $this->xDireita = $xDireita;
    }


    private function ehMultiploDeTres(int $numero): bool
    {
        /**Aqui é para verificar se o numero é multiplo de 3
         * Exemplo do numero 5, cinco mod 3 é = 2. Ps mod é a função devolve o resto de uma divisão 5/3 = 3*1 + 2 
         * Se o mod é 0, quer dizer uma divisão exata, ou seja o numero é divisivel por 3. 
         * Exemplo 6/3 = 2 e não tem resto
         */
        return $numero % 3 == 0;
    }

    private function encontrarPrimeiroMultiploDeTresAposUmNumero(int $numero): int
    {
        /**
         * Aqui verifiquei se o numero é divisivel por 3, se ele for eu ja devolvo ele e encerro a função,
         * caso não seja eu faço a divisão do numero por 3, arredondo ele para cima e multiplico por 3.
         * Ex. numero 7
         * 7/3 = 2.3333  Arredondando para cima fica 3
         * 3*3 = 9 que é o primeiro numero do lado esquerdo
         */
        if ($this->ehMultiploDeTres($numero)) return $numero;
        $multiplo = ceil($numero / 3) * 3;
        return $multiplo;
    }

    public function imprimeNumerosMultiploTres(): void
    {
        /**
         * aqui só exibo o valores dos multiplos
         */
        for ($i = $this->xEsquerda; $i < $this->xDireita; $i += 3) {
            echo $i . PHP_EOL;
        }
    }
}
/**Aqui crio a instancia da classe que criei acima com os dois numeros
 * e mando imprimir
 */
$teste = new TesteEmprego(2, 21);
$teste->imprimeNumerosMultiploTres();

/**
 * A saida da função é a seguinte:
 * 3
 * 6
 * 9
 * 12
 * 15
 * 18
 * 
 * O 21 não sai, pois a primicia do programa falava que o intervalo era aberto do lado direito, ou seja o numero não fazia parte
 * do conjunto
 */
