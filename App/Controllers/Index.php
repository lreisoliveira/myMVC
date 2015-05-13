<?php

/**
 * Cada método da classe Index corresponde a uma página html que tem que existir em
 * /App/view/index/pagina.phtml, onde pagina.phtml é o nome da método correspondente
 * ------------------------------------------------------------------------------------
 * Sobre os códigos a seguir:
 * 
 * 1] use SON\Controller\Action
 * 
 * Faz com que a classe SON\Controller\Action fique disponível no escopo deste arquivo.
 * 
 * Atenção: isto não é um include ou require. Apenas indica onde a classe Action 
 * está quando ela for solicitada, que aqui se dá ao ser extendida pela class Index.
 * 
 * Ao extender a class Action, suas propriedades e métodos ficam disponíveis na class que
 * chamou (no caso, a deste arquivo) ou seja a classe Index herda tudo que estiver público ou 
 * protected da class Action. E vice-versa. Pai conversa com filho e filho conversa com pai.
 * 
 * 2] use SON\Controller\Crud
 * 
 * O processo é o mesmo do anterior, ou seja, não é feito a inclusão da classe até
 * que seja solicitada e neste caso, o código "use Crud" DENTRO DA CLASSE Index
 * é que indica a inclusão. Este processo se chama Trait.
 * 
 * Leia mais sobre Traits aqui:
 * 
 * http://php.net/manual/pt_BR/language.oop5.traits.php
 * 
 * Sendo assim ao usar o trait Crud, assim como as classes extendidas, as propriedades
 * e métodos protected e public ficam disponíveis no escopo de quem chamou.
 * 
 * No método listar(), o código $this->setModel() pertence ao trait.
 * 
 */

namespace App\Controllers;

use SON\Controller\Action,
    SON\Controller\Crud,
    SON\Di\Container;

/**
 * Class Index
 *  
 * @author leandro
 */
class Index extends Action 
{
	use Crud;

    /**
     * Página inicial. Este método renderiza o arquivo /views/index/index.phtml
     *
	* @access public
     */
    public function index() 
    {
    	/**
    	 * Variável de nome "teste" recebendo valor 123456 
    	 */
    	$this->view->teste = 123456;
    }

	/**
	 * Página que consulta o banco de dados.
	 * Este método renderiza o arquivo /views/index/listar.phtml
	 * 
 	 * @access public
	 */
	public function listar() 
	{
		/**
		 *  A chamada do método abaixo está dentro da trait Crud.
		 *  O parâmetro 'noticias' corresponde ao model que será acessado
		*/
     	$this->setModel('noticias');

     	/**
     	 * O método está dentro da trait Crud.
     	 * Ele que faz a consulta na base de dados e retorna um array com o resultado
     	*/
		$this->view->objetos = $this->selectAll();
    }
}