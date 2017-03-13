<?php
namespace Rental\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Rental\Form\RentalForm;
use Rental\Model\Rental;
class RentalController extends AbstractActionController{
	protected $rentalTable;
	public function indexAction(){
		return new ViewModel(array(
		'datavcd' => $this->getRentalTable()->fetchAll(),
		));
	
	}
	public function addAction(){
			$adakesalahan = FALSE;
		$form = new RentalForm();
		$form->get('submit')->setValue('Add');
		$request = $this->getRequest();
		if($request->isPost()){
		$rental = new Rental();
		$form->setInputFilter($rental->getInputFilter());
		$form->setData($request->getPost());
		if($form->isValid()){
				$dataform =$form->getData();
				$rental->exchangeArray($dataform);
				$this->getRentalTable()->saveRental($rental);					
					return $this->redirect()->toRoute(NULL , array(
				'controller' => 'Rental',
				'action' => 'berhasil'
		));									
			}else{
				$adakesalahan=TRUE;
			}
			
		}
		return new ViewModel(array(
		'form'=>$form,
		'adakesalahan'=>$adakesalahan,
		));
	
	}
	public function berhasilAction(){
		$viewModel = new ViewModel();
		return $viewModel;
	}
	public function editAction(){
		$idvcd = $this->params()->fromRoute('id', 0);
		try{
			$rental= $this->getRentalTable()->idvcd_ada($idvcd);
		}
	catch (\Exception $ex) {
			return $this->redirect()->toRoute('Rental', array(
			'action' => 'index'
		));
		}
		$form = new RentalForm();
		$form->bind($rental);
		$form->get('submit')->setValue('Edit');
		$request = $this->getRequest();
		if ($request->isPost()){
			$form->setInputFilter($rental->getInputFilter());
			$form->setData($request->getPost());
			if($form->isValid()){
				$this->getServiceLocator()->get('Rental\Model\RentalTable')->saveRental($rental);
				return $this->redirect()->toRoute(NULL, array(
				'controller' => 'Rental',
				'action' => 'index'
				));
			}
		}
		return new ViewModel(array(
		'idVcd' => $idvcd,
		'form' => $form,
		));
	
	}
	public function hapusAction(){
		$adakesalahan = FALSE;
		$idvcd = $this->params()->fromRoute('id', 0);
		if (!$idvcd) {
		return $this->redirect()->toRoute('Rental');
		}
		$datavcd=$this->getRentalTable()->idvcd_ada($idvcd);
		if(!$datavcd){
			$adakesalahan=TRUE;
		}
		$request = $this->getRequest();
		if($request->isPost()){
			$pilihan = $request->getPost('hapus', 'Tidak');
			if ($pilihan == 'Ya') {
				$idVcd = $request->getPost('idVcd');
				
				$this->getServiceLocator()->get('Rental\Model\RentalTable')
					->hapusVcd($idVcd);
				}
				
				return $this->redirect()->toRoute('Rental');
		}
		return new ViewModel(array(
		'idvcd' => $idvcd,
		'datavcd'=> $datavcd,
		'adakesalahan'=>$adakesalahan,
		));
		
	
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