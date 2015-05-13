<?php

/**
 * Nome deste espaço de nome (namespace) 
 */
namespace App;

/**
 * 
 * O código a seguir
 * 
 * use SON\Init\Bootstrap;
 * 
 * faz com que a classe SON\Init\Bootstrap fique disponível no escopo deste arquivo.
 * 
 * Atenção: isto não é um include ou require. Apenas indica onde a classe Bootstrap
 * está quando ela for solicitada, que aqui se dá ao ser extendida pela class Init.
 * 
 * Esta classe Init, ao extender a class Bootstrap faz com que  propriedades e
 * métodos que estão na class Bootstrap fiquem disponíveis na class Init, ou seja
 * a classe Init herda tudo que estiver público ou protected da class Bootstrap.
 * e vice-versa. Pai conversa com filho e filho conversa com pai.
 */
use SON\Init\Bootstrap;

/**
 * 
 * Pode parecer estranho ao olhar a class Init abaixo, pois tem somente um método e
 * este parece não estar sendo chamado em lugar algum.
 * A explicação é simples. No file que chama esta class em /public/index.php estamos
 * instanciando assim: new \App\Init; Ao ser executado este comando o construtor da
 * class é chamado.
 * 
 *  Mas esta class Init não tem construtor!
 *  
 *  Tem sim, o construtor chamado é da class extendida Bootstrap (lembra quando citei
 *  acima que Init herda de Bootstrap?)
 *  Veja o construtor da classe Bootstrap e verá o método abaixo, _initRoutes(),
 *  sendo chamado lá.
*/
class Init extends Bootstrap 
{
    /**
     * Este método define as rotas que podem ser chamadas pela URL.
     * 
     * Exemplo: Ao acessar http://site.com/cadastro, internamente o framework vai
     * descobrir qual é o controller e action que serão chamados.
     * 
     * Na medida que for criando os controllers, deve-se explicitar o que pode ser
     * chamado pois pode acontecer de um projeto ter controller que são processos que
     * não podem ficar expostos via URL.
     * 
     * No exemplo abaixo, ao acessar http://site.com/home a rota com o nome 'home'
     * apontará para /App/Controllers/Index.php
     * 
	 * @access protected
     */
    protected function _initRoutes() 
    {
    	/**
         * Rotas permitidas
         */
        $ar['home1'] 	= ['route' => '/', 'controller' => 'index', 'action' => 'index'];
        $ar['home2']	= ['route' => '/home', 'controller' => 'index', 'action' => 'index'];
        $ar['listar1']	= ['route' => '/listar', 'controller' => 'index', 'action' => 'listar'];
        $ar['listar2']	= ['route' => '/listar/', 'controller' => 'index', 'action' => 'listar'];

        /**
         * Seta o array de rotas na propriedade definida por este método da class Boostrap
         */
        $this->setRoutes($ar);
    }
}