<?php
namespace Rental\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
class RentalController extends AbstractActionController{
	protected $rentalTable;
	public function indexAction(){
		return new ViewModel(array(
		'datavcd' => $this->getRentalTable()->fetchAll(),
		));
	
	}
	public function addAction(){
	
	}
	public function editAction(){
	
	}
	public function hapusAction(){
	
	}
	public function getRentalTable(){
		if(!$this->rentalTable){
			$sm = $this->getServiceLocator();
			$this->rentalTable = $sm->get('Rental\Model\RentalTable');
			return $this->rentalTable;
		}
	}
	public function peminjamanAction(){
		return new ViewModel(array(
		'datapeminjaman' => $this->getRentalTable()->peminjaman_vcd(),
		));
	}
	public function kriteriaAction(){
		return new ViewModel(array(
		'peminjamankriteria' => $this->getRentalTable()->peminjamankriteria('PEL002'),
		));
	}
}