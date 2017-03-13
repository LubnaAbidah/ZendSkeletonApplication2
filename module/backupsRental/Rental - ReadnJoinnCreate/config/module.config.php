<?php

return array(
'controllers' => array(
'invokables' => array(
	'Rental\Controller\Rental' =>
	'Rental\Controller\RentalController',

),
),
	'router' => array(
	'routes'=> array(
	'Rental' => array(
	'type' => 'segment',
	'options' => array(
	'route' => '/rental[/][:action][/:id]',
	'constraints' => array(
	'action' =>'[a-zA-Z][a-zA-Z0-9_-]*',
		'id' => '[a-zA-Z0-9_-]*',
		),
	'defaults' => array(
	'__NAMESPACE__' => 'Rental\Controller',
	'controller' => 'Rental',
	'action' => 'index',
			),
		),
		),
	),
	),
	'view_manager' => array(
	'template_path_stack' => array(
	'Rental'=> __DIR__ . '/../view',
	),
	),
);