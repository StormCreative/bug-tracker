<?php
use Codeception\Util\Stub;

class clientsAdminTest extends \Codeception\TestCase\Test
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
    private $_data = array ( "clients" => array ( "title" => "Unit Test Data", "url" => "Unit Test Data" ) );

    protected function _before()
    {
        $this->_model = new clients_model();
    }

    protected function _after() {}

    public function testInstantiation ()
    {
        $this->assertInstanceOf ( 'clients_model', $this->_model );
    }

    public function testSaveWithoutTitle() {
                unset ( $this->_data[ "clients" ][ "title" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "clients" ] ) );
           }

           public function testSaveWithoutUrl() {
                unset ( $this->_data[ "clients" ][ "url" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "clients" ] ) );
           }

           

    public function testSaveSuccessful ()
    {
        $this->assertTrue ( $this->_model->save ( $this->_data[ 'clients' ] ) );
    }
}

?>