<?php 
namespace Statute\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class StatuteTable
{
	protected $tableGateway;
  
	public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    } 

    public function addStatute(Statute $statute)
    {
    	$data = array(            
            'description_1'  => $statute->description_1,            
        );	
        $this->tableGateway->update($data, array('id' => 1));
    }

    public function getById($id)
	{
		$rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        return $row;
	}
}