<?php
use Codeception\Util\Stub;

class clients_contactsAdminTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    /**
     * @var the model object
     */
    private $_model;

    /**
     * @var some mock data
     */
    private $_data = array ( "clients_contacts" => array ( "title" => "Unit Test Data", "email" => "Unit Test Data", "password" => "Unit Test Data", "clients_id" => "Unit Test Data" ) );

    protected function _before()
    {
        $this->_model = new clients_contacts_model();
    }

    protected function _after() {}

    public function testInstantiation ()
    {
        $this->assertInstanceOf ( 'clients_contacts_model', $this->_model );
    }

    public function testSaveWithoutTitle() {
                unset ( $this->_data[ "clients_contacts" ][ "title" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "clients_contacts" ] ) );
           }

           public function testSaveWithoutEmail() {
                unset ( $this->_data[ "clients_contacts" ][ "email" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "clients_contacts" ] ) );
           }

           public function testSaveWithoutPassword() {
                unset ( $this->_data[ "clients_contacts" ][ "password" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "clients_contacts" ] ) );
           }

           public function testSaveWithoutClients_id() {
                unset ( $this->_data[ "clients_contacts" ][ "clients_id" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "clients_contacts" ] ) );
           }

           

    public function testSaveSuccessful ()
    {
        $this->assertTrue ( $this->_model->save ( $this->_data[ 'clients_contacts' ] ) );
    }
}

?>