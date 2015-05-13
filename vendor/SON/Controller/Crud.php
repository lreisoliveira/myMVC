<?php

/**
 * Processo que define o model (repositório de dados) a ser utilizado e como as consultas a este
 * repositório serão realizadas.
 */
namespace SON\Controller;

//Contem a conexão com o repositório
use SON\Di\Container;

/**
 * Esta classe é um trait
 *
 * Leia mais sobre Traits aqui: http://php.net/manual/pt_BR/language.oop5.traits.php
 */
trait Crud 
{
    /**
     * Model a ser utilizado
     * 
     * @var unknown
     */
	protected $model;

    /**
     * Define o model
     * 
     * @access public
     * @param unknown $model
     */
    public function setModel($model) 
    {
        $this->model = Container::getClass($model);
    }

    /**
     * Select todos os registros
     * 
     * @access public
     * @return array
     */
    public function selectAll() 
    {  
        return $this->model->fetchAll();
    }

    /**
     * Select com cláusula where
     * 
     * @access public
     * @todo Criar processo
     */
    public function selectWhere() 
    {

    }
    
    /**
     * Insert
     * 
     * @access public
	 * @todo Criar processo de inclusão
     */
    public function adicionar() 
    {

    }

    /**
     * Update
     * 
     * @access public
	 * @todo Criar processo de atualização
     */
    public function atualizar() 
    {
    }

    /**
     * Delete
     * 
     * @access public
	 * @todo Criar processo de exclusão
     */
    public function excluir() 
    {

    }
}