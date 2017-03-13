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
	public function peminjaman_vcd(){
		$sqlSelect = $this->tableGateway->getSql()->select();
		$sqlSelect->columns(array('judulVcd'));
		$sqlSelect->join('data_peminjaman', 'data_peminjaman.idvcd = data_vcd.idvcd', array('tglPeminjaman','tglPengembalian'), 'inner');
		$sqlSelect->join('data_pelanggan', 'data_pelanggan.idPelanggan = data_peminjaman.idPelanggan', array('idPelanggan','namaPelanggan'), 'inner');
	$resultSet = $this->tableGateway->selectWith($sqlSelect);
	return $resultSet;
	}
	function peminjamankriteria($idpelanggan){
	//function peminjamankriteria(){
		$sqlSelect = $this->tableGateway->getSql()->select();
	$sqlSelect->columns(array('judulVcd'));
	$sqlSelect->join('data_peminjaman','data_peminjaman.idvcd = data_vcd.idvcd', 
	array('tglPeminjaman'), 'inner');
	$sqlSelect->join('data_pelanggan','data_pelanggan.idPelanggan = data_peminjaman.idPelanggan', 
	array('idPelanggan','namaPelanggan'), 'inner');
	$sqlSelect->where(array('data_pelanggan.idPelanggan' =>$idpelanggan));
	$resultSet = $this->tableGateway->selectWith($sqlSelect);
	return $resultSet;
	}
}