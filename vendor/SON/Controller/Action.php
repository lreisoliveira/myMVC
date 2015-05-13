<?php

/**
 * Implementa os métodos necessários para os todos os controllers funcionarem iguais. 
 */

namespace SON\Controller;

/**
 * Classes abstrata. Deve conter ao menos um método abstrado.
 * 
 * Todos os métodos abstratos definidos como tal devem ser implementados
 * na classe filha (classe que chamou).
 */
abstract class Action 
{

    protected $action;
    protected $view;
    
    /**
     * Este construtor é executado ao ser extendido pela classe que chamou 
     *  
     * @access public
     * @param string $view
     */
    public function __construct($view=null) 
    {
        //stdClass é classe nativa do PHP que manipula objetos. A barra inverdida é 
        //obrigatória pois indica que estamos chamando um recurso do PHP. Se tirar, 
        //por estarmos utilizando namespaces, o PHP irá procurar por um e não encontrará
    	$this->view = new \stdClass();
                
        //se nenhuma view tiver sido definida, o padrao é index
        if(is_null($view)) $view = 'index';
        
        $this->action = $view;
    }
    
    /**
     * Renderiza o layout
     * 
     * @access protected
     */
    protected function render() 
    {
        if(file_exists('../App/views/layout.phtml')) {
            include_once '../App/views/layout.phtml';
        }
    }

    /**
     * Renderiza o arquivo phtml correspondente ao controller que chamou esta classe
     * 
     * @access protected
     */
    protected function content() 
    {
        $string = explode("\\",get_class($this));
        $controller = strtolower(array_pop($string));
        $arquivo = '../App/views/' . $controller . '/' . $this->action . '.phtml';
        
        if(file_exists($arquivo)) {
            include_once $arquivo;
            return;
        }
        
        //Caso não exista o html solicitado, mostra página de erro 
        include_once '../App/views/erro/index.phtml';
    }

    /**
     * Ao terminar de executar esta classe, o destrutor renderiza o layout
     * 
     * @access public
     */
    public function __destruct() 
    {
        $this->render();
    }
}