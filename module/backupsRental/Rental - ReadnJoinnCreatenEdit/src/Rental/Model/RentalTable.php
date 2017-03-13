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
	function saveRental(Rental $rental){
		$data = array(
			'idVcd' => $rental->idVcd,
			'judulVcd' => $rental->judulVcd,
			'kategori' => $rental->kategori,
			'deskripsi' => $rental->deskripsi,
			'bykCD' => $rental->bykCD,
			'hargaVcd' => $rental->hargaVcd,			
		);
		$idVcd=$rental->idVcd;
		
		if($this->idvcd_ada($idVcd)){
			$this->tableGateway->update($data, array('idVcd' => $idVcd));
		}else{
			$this->tableGateway->insert($data);
		}
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
		public function idvcd_ada($idvcd){
		$rowset = $this->tableGateway->select(array('idVcd' => $idvcd));
		$row = $rowset->current();
		return $row;
	}
}