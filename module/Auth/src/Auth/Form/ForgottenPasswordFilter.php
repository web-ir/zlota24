<?php
namespace Auth\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class ForgottenPasswordFilter extends InputFilter
{
	public function __construct($sm)
	{
        $this->add(array(
            'name'       => 'email',
            'required'   => true,
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                ),
				array(
					'name'		=> 'Zend\Validator\Db\RecordExists',
					'options' => array(
						'table'   => 'vm_user',
						'field'   => 'email',
						'adapter' => $sm->get('Zend\Db\Adapter\Adapter'),
					),
				),
            ),
        ));	
	}
}