<?php
namespace Rental\Model;
use Zend\Db\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class RentalTable{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway){
	$this->tableGateway = $tableGateway;
	$this->select = new Select();
	}
	public function fetchAll(){
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
}