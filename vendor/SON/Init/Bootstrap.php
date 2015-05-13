<?php

/**
 * O código a seguir
 * 
 * use SON\Init\Bootstrap;
 * faz com que a classe SON\Init\Bootstrap fique disponível no escopo deste arquivo.
 * Atenção: isto não é um include ou require. Apenas indica onde a classe Bootstrap
 * está quando ela for solicitada, que aqui se dá ao ser extendida pela class Init.
 * 
 * Esta classe Init, ao extender a class Bootstrap faz com que as propriedades e
 * métodos que estão na class Bootstrap fiquem disponíveis na class Init, ou seja
 * a classe Init herda tudo que estiver público ou protected da class Bootstrap.
 * E vice-versa. Pai conversa com filho e filho conversa com pai.
 */

namespace SON\Init;

/**
 * A class Bootstrap é abstrata, ou seja, quem extender ela deve seguir
 * um contrato para não fugir do padrão de implementação.
 * 
 * Basicamente, em classes abstratas os método declarados como abstrados devem ser
 * implementados por quem chamou. Neste exemplo, _initRoutes().
 * 
 *  Métodos abstrados possuem apenas a assinatura. Dependendo do projeto, pode haver
 *  várias classes chamando o mesmo método de uma única class abstrada, porém, este
 *  método pode ter comportamento diferente em cada classe que chamou, ou em outras
 *  palavras, contratou o serviço.
 *  
 *  Referência: http://php.net/manual/pt_BR/language.oop5.abstract.php
 */
abstract class Bootstrap 
{
    /**
     * Propriedade $this->routes: armazena as rotas pré-definidas pela classe que
     * extendeu esta
     */
    protected $routes;

    /**
     * 
     */
    public function __construct() 
    {
        //Este método initRout() fica na classe que extendeu esta
        $this->_initRoutes();

        //chama o método initRout() da classe que extendeu esta
        $this->run($this->getUrl());
    }
    
    /**
     * Este método recebe as rotas pré-definidas pela metodo _initRoutes() da classe 
     * que chamou esta e atribui à propriedade $this->routes
     * 
     * @param array $routes
     */
    public function setRoutes(array $routes) 
    {
        $this->routes = $routes;
    }
    
    /**
     * Este método recebe a $url requisitada, instancia a respectiva classe e executa 
     * a action
     * 
     * @param unknown $url
     */
    protected function run($url) 
    {
        /**
         * A rotina abaixo utiliza função anônima tipo closure
         * 
         * Referência:
         * http://www.diogomatheus.com.br/blog/php/funcoes-anonimas-lambda-e-closure-no-php/
         * 
         * array_walk() percorre o array $this->routes (que contém as rotas
         * pré-definidas pelo método _initRoutes()) e para cada
         * item durante a iteracao, aplica o segundo parâmetro que é uma closure
         * function. Para esta closure function é passado a url solicitada.
         * 
         * A rotina verifica se a URL informada é compatível com as rotas pré-definidas
         * Em caso positivo, chama o controlle e action solicitados.
        */
        array_walk($this->routes, function($route) use ($url) {

            //se a url informada casa com a rota pré-definidas
            //instancia o controller e chama a action
            if($url==$route['route']) {
                $class = 'App\\Controllers\\'.ucfirst($route['controller']);
                $controller = new $class($route['action']);
                $controller->$route['action']();
                return;
            }
        });

        //se não achar, chama controller de Erro
        $class = 'App\\Controllers\\Erro';
        $controller = new $class;
        $controller->index();
    }

    /**
     * Identifica a URL solicitada. Exemplo: http://site.com/cadatro/listar.php
     * E extraído somente cadatro/listar.php
     */
    protected function getUrl() 
    {   
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //$pattern = "#([a-zA-Z0-9\/]+)(\?.*)?#";
        //return preg_replace($pattern,"$1",$_SERVER['REQUEST_URI']);
    }
    
    /**
     * Método abastract, que deve ser definido na classe que chamou
     */
    abstract protected function _initRoutes();
}