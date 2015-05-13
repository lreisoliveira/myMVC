<?php

/**
 * Abstração da tabela de notícias 
 */

namespace App\Models;

use SON\Db\Table;

/**
 * Ao extender da classe Table, os métodos desta classe ficam dispionível
 * nesta. Nesta situação, _insert() e _update() são abstratos e por isso
 * devem ser implementados na classe que chamou. Estão aqui para fins didáticos. 
 */
class Noticias extends Table 
{
    /**
     * Nome da tabela no banco de dados
     * 
     * @var string
     */
	protected $table = 'noticias';

    /**
     * Método que implementa insert
     * 
     * @todo Criar processo
     * 
     * (non-PHPdoc)
     * @see \SON\Db\Table::_insert()
     */
    public function _insert(array $data) 
    {
        return;
    }

    /**
     * Método que implementa update
     * 
     * @todo Criar processo
     * 
     * (non-PHPdoc)
     * @see \SON\Db\Table::_update()
     */
    public function _update(array $data) 
    {
        return;
    }
}