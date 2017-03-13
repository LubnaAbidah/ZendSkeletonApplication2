<?php
namespace Rental\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
class Rental {
public $idVcd;
public $judulVcd;
public $kategori;
public $deskripsi;
public $bykCD;
public $hargaVcd;
public $idPelanggan;
public $tglPeminjaman;
public $tglPengembalian;
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
$this->tglPengembalian= (isset($data['tglPengembalian'])) ? 
	$data['tglPengembalian'] : null;
$this->namaPelanggan= (isset($data['namaPelanggan'])) ? 
	$data['namaPelanggan'] : null;
}
	public function getArrayCopy(){
        return get_object_vars($this);
    } 
	public function setInputFilter(InputFilterInterface $inputFilter){
        throw new \Exception("Not used");
    }
	public function getInputFilter(){
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
			$inputFilter->add(array(
			'name'	=>'idVcd',
			'required' => true,
			'filters' => array(
				array('name'=>'StripTags'),
			),
			'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 6,
                            'max'      => 6,
                        ),
                    ),
                ),
			));     
            $this->inputFilter = $inputFilter;
        }
 
        return $this->inputFilter;
}
}