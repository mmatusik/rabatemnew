<?php
namespace Offer\Form;

use Zend\Form\Form;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Adapter;

class CityForm extends Form
{
    protected $adapter;
    public function __construct(AdapterInterface $dbAdapter, $id_admin)
    {
        $this->adapter =$dbAdapter;
                parent::__construct("Test Form");
        $this->setAttribute('method', 'post');
                //your select field
        $this->add(array(
            'type' => 'Zend\Form\Element\MultiCheckbox',
            'name' => 'ourcity',
            'options' => array(
                'Label' => 'Pozostałe miasta',
                'value_options' => $this->getOptionsForSelect($id_admin),
                )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\MultiCheckbox',
            'name' => 'othercity',
            'options' => array(
                'Label' => 'Twoje miasta',
                'value_options' => $this->getOptionsForSelectCity($id_admin),
                )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Dalej',
                'class' => 'button round blue image-right ic-right-arrow',
            ),
        ));

}
    public function getOptionsForSelect($id_admin)
    {
        $dbAdapter = $this->adapter;
        $sql       = 'SELECT id,name  FROM city WHERE id_admin = '.$id_admin.'';

        $statement = $dbAdapter->query($sql);
        $result    = $statement->execute();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['id']] = $res['name'];
        }
        return $selectData;
    }

    public function getOptionsForSelectCity($id_admin)
    {
        $dbAdapter = $this->adapter;
        $sql       = 'SELECT id,name,id_admin  FROM city';

        $statement = $dbAdapter->query($sql);
        $result    = $statement->execute();

        $selectData = array();

        foreach ($result as $res) {
            if($res['id_admin'] != $id_admin) {
                $selectData[$res['id']] = $res['name'];
            }
        }
        return $selectData;
    }
}