<?php
namespace Rental;
use Rental\Model\Rental;
use Rental\Model\RentalTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
class Module{
	public function getAutoloaderConfig(){
	return array(
	'Zend\Loader\ClassMapAutoloader' => array(
	__DIR__ . '/autoload_classmap.php',
		),
	'Zend\Loader\StandardAutoloader' => array(
	'namespaces' => array(
	__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
	),
	),
	);
}
public function getConfig(){
	return include __DIR__ . '/config/module.config.php';
	}
public function getServiceConfig(){
	return array(
	'factories' => array(
	'Rental\Model\RentalTable' => function($sm){
		$tableGateway = $sm->get('RentalTableGateway');
		$table = new RentalTable($tableGateway);
		return $table;
	},
	'RentalTableGateway' => function ($sm) {
		$dbAdapter = $sm->get('Zend\DB\Adapter\Adapter');
		$resultSetPrototype = new ResultSet();
		$resultSetPrototype->setArrayObjectPrototype(new Rental());
		return new TableGateway('data_vcd', $dbAdapter, null, $resultSetPrototype);
	},
	),
	);
}
	
}