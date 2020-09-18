<?php

namespace Sysco\Aurora\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Metadata\Metadata;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\ArraySerializable;

class Table
{

    protected $primary;
    protected $metadata;
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }

    public function getMetadata()
    {
        if (is_null($this->metadata)) {
            $this->metadata = new Metadata($this->tableGateway->getAdapter());
        }

        return $this->metadata;
    }

    public function getPrimary()
    {
        if (null === $this->primary) {
            $constraints = $this->getMetadata()->getTable($this->tableGateway->getTable())
                    ->getConstraints();

            foreach ($constraints AS $constraint) {
                if ($constraint->isPrimaryKey()) {
                    $primaryColumns = $constraint->getColumns();
                    $this->primary = $primaryColumns;
                }
            }
        }

        return $this->primary;
    }

    public function save($data = array())
    {
        if (empty($data))
            return;

        $values = array();

        $columns = $this->getMetadata()->getColumnNames($this->tableGateway->getTable());

        $primary = $this->getPrimary();

        foreach ($columns as $column) {
            if ($column != $primary && array_key_exists($column, $data)) {
                $values[$column] = is_array($data[$column]) ? serialize($data[$column]) : $data[$column];
            }
        }

        if (!empty($primary)) {
            $where = array_filter(array_intersect_key($data, array_flip($primary)));

            if (count($where) == count($primary)) {
                $this->tableGateway->update($values, $where);
                return count($where) === 1 ? current($where) : $where;
            } else {
                $this->tableGateway->insert($values);
                return $this->tableGateway->lastInsertValue;
            }
        } else {
            return $this->tableGateway->insert($values);
        }
    }

    public function delete($args = array())
    {        
        return $this->tableGateway->delete($args);
    }        

    public function getAll($args = array())
    {
        return $this->tableGateway->select($args);
    }

    public function fetchAll(\Zend\Db\Sql\Select $sql)
    {
        $resultSet = $this->tableGateway->getResultSetPrototype();
        return $resultSet->initialize($this->executeSql($sql));
    }

    public function fetchOne(\Zend\Db\Sql\Select $sql)
    {
        $rowSet = $this->fetchAll($sql);
        return $rowSet->count() === 0 ? false : $rowSet->current();
    }

    public function findBy($key, $value)
    {
        return $this->tableGateway->select(array($key => $value))->current();
    }

    public function __call($method, $arguments)
    {
        if (substr($method, 0, 6) === 'findBy') {
            return $this->findBy(lcfirst(substr($method, 6)), $arguments[0]);
        }

        throw new \Exception(
        "Undefined method '$method'. The method name must start with " .
        "either findBy or findOneBy!"
        );
    }

    public function executeSql($sql)
    {
        $statement = $this->tableGateway->getAdapter()->createStatement();
        $sql->prepareStatement($this->tableGateway->getAdapter(), $statement);
        return $statement->execute();
    }

}