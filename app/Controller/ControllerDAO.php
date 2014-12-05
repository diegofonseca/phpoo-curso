<?php
/**
* Created by fonseca
* Date: 05/12/14
* Time: 13:43
* Email: diego@cbk.com.br
*/
namespace Controller;

abstract class ControllerDAO extends \PDO
{
    abstract public function getTable();
    abstract public function getFields();
    public function __construct()
    {
        $dsn = sprintf("mysql:host=%s;dbname=%s", "localhost", "unesc");
        parent::__construct($dsn, "root", "123");
    }

    public function buscar($id)
    {
        $query = sprintf("SELECT * FROM %s WHERE id = ?", $this->getTable());
        $result = $this->prepare($query);
        $result->bindValue(1, $id);
        $result->execute();
        return $result->fetchObject();
    }

    public function listar()
    {
        $query = sprintf("SELECT * FROM %s", $this->getTable());
        $result = $this->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }

    public function salvar($dado)
    {
        $fields = $this->getFields();
        $colunas = [];
        foreach ($fields as $field)
            $colunas[] = '?';

        $sql = sprintf("INSERT INTO %s (%s) VALUES(%s)",
            $this->getTable(),
            implode(',', $fields), implode(',', $colunas));

        $stmt = $this->prepare($sql);
        $i = 1;
        foreach ($fields as $field) {
            $stmt->bindValue($i, $dado[$field]);
            $i++;
        }

        $stmt->execute();
    }

    public function editar($dado)
    {
        $fields = $this->getFields();
        $colunas = [];

        foreach ($fields as $field)
            $colunas[] = "{$field} = '{$dado[$field]}'";

        $sql = sprintf("UPDATE %s SET %s WHERE id= %s",
            $this->getTable(), implode(',', $colunas), $dado['id']);
        $stmt = $this->prepare($sql);
        $stmt->execute();
    }

    public function excluir($id)
    {
        $query = sprintf("DELETE FROM %s WHERE id = :id", $this->getTable());
        $stmt = $this->prepare($query);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        return true;
    }

}