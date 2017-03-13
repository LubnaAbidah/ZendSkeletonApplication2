<?php
namespace Rental\Model;
class Rental {
public $idVcd;
public $judulVcd;
public $kategori;
public $deskripsi;
public $bykCD;
public $hargaVcd;
public $idPelanggan;
public $tglPeminjaman;
public $namaPelanggan;
protected $inputFilter;
public function exchangeArray($data){
$this->idVcd = (isset($data['idVcd'])) ?
	$data['idVcd'] : null;
$this->judulVcd = (isset($data['judulVcd'])) ? 
	$data['judulVcd'] : null;
$this->kategori = (isset($data['kategori'])) ? 
	$data['kategori'] : null;
$this->deskripsi= (isset($data['deskripsi'])) ? 
	$data['deskripsi'] : null;
$this->bykCD= (isset($data['bykCD'])) ? 
	$data['bykCD'] : null;
$this->hargaVcd= (isset($data['hargaVcd'])) ? 
	$data['hargaVcd'] : null;
$this->idPelanggan= (isset($data['idPelanggan'])) ? 
	$data['idPelanggan'] : null;
$this->tglPeminjaman= (isset($data['tglPeminjaman'])) ? 
	$data['tglPeminjaman'] : null;
$this->namaPelanggan= (isset($data['namaPelanggan'])) ? 
	$data['namaPelanggan'] : null;
}	
}