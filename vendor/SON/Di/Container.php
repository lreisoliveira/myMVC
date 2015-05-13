<?php

/**
 * Conexão com o repositório de dados
 */
namespace SON\Di;

/**
 * Container é a classe que gerencia a conexão com o banco de dados 
 */
class Container 
{
    /**
     * Conexão com o repositório
     * 
     * @access private
     * @return \PDO
     */
	private static function getDb() 
    {
        $db = new \PDO('mysql:host=192.168.33.10;dbname=artigos', 'root', 'root');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    /**
     * Retorna a instância do modelo requisitado
     *
     * @access public
     * @param unknown $name
     * @param string $data
     * @return unknown
     */
    public static function getClass($name, $data = "") 
    {
        $str_class = '\\App\\Models\\' . ucfirst($name);
        
        if ($data)
            $class = new $str_class(self::getDb(), $data);
        else
            $class = new $str_class(self::getDb());
        return $class;
    }
}