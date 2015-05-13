<?php

/**
 * Contém os métodos de iteração com base de dados
 */

namespace SON\Db;

use SON\Di\Container;

/**
 * Classes abstrata. Deve conter ao menos um método abstrado.
 * 
 * Todos os métodos abstratos definidos como tal devem ser implementados
 * na classe filha (classe que chamou).
 */
abstract class Table 
{

    /**
     * Conexão com o banco de dados
     * 
     * @var objetct
     */
	protected $db;

    /**
     * Nome da tabela
     * 
     * @var unknown
     */
	protected $table;

    /**
     * Define a conexão com o banco de dados
     * 
     * @param object $db
     */
    public function __construct($db) 
    {
        $this->db = $db;
    }

    /**
     * Retorna resultado da select do model definido
     * 
     * @return Ambigous <multitype:, unknown>
     */
    public function fetchAll() 
    {
        $query = "Select * from " . $this->table;
        $rs = $this->db->query($query);
        $array = array();
        $i = 0;
        while($row = $rs->fetch(\PDO::FETCH_OBJ)) 
        {
            foreach($row as $campo => $valor) {
                $array[$i][$campo] = $valor;
            } 
            $i++;
        }
        return $array;
    }

    /**
     * Update ou Insert
     * 
     * @param array $data
     */
    public function save(array $data) 
    {
        if (isset($data['id'])) {
            $this->_update($data);
        } else {
            $this->_insert($data);
        }
    }

    /**
     * Delete
     * 
     * @param unknown $id
     */
    public function delete($id) 
    {
        $query = "delete from " . $this->table . " where id=" . (int) $id;
        return $this->db->query($query);
    }

    /**
     * Método abstract. Deve ser implementado na classe que chamou
     * 
     * @param array $data
     */
    abstract public function _insert(array $data);

    /**
     * Método abstract. Deve ser implementado na classe que chamou
     * 
     * @param array $data
     */
    abstract public function _update(array $data);
}