<?php
namespace Rental\Form;
use Zend\Form\Form;
class RentalForm extends Form{
public function __construct($name = null)
{
	parent::__construct('rental');
	$this->add(array(
	'name' => 'idVcd',
	'type' => 'Text',
	'options' => array(
	'label' => 'ID VCD: ',
	),
	));
	$this->add(array(
             'name' => 'judulVcd',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Judul VCD: ',
             ),
         ));
		 $this->add(array(
             'name' => 'kategori',
             'type' => 'Select',
             'options' => array(
                 'label' => 'Kategori: ',
				 'value_options' => array(
					'Drama' => 'Drama',
					'Action' => 'Action',
					'Spionase' => 'Spionase',
					'Horor' => 'Horor',
				),
             ),
         ));
		 $this->add(array(
             'name' => 'deskripsi',
             'type' => 'Textarea',
             'options' => array(
                 'label' => 'Deskripsi: ',
             ),
         ));
		 $this->add(array(
             'name' => 'bykCD',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Banyak VCD: ',
             ),
         ));
		 $this->add(array(
             'name' => 'hargaVcd',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Harga VCD: ',
             ),
         ));
		 $this->add(array(
		 'name' => 'submit',
		 'type' => 'Submit',
		 'attributes' => array(
		 'value' => 'Go',
		 'id' => 'submitbutton',
		 ),
		 ));
}
}