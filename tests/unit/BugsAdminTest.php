<?php
use Codeception\Util\Stub;

class bugsAdminTest extends \Codeception\TestCase\Test
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
    private $_data = array ( "bugs" => array ( "clients_contacts_id" => "Unit Test Data", "url" => "Unit Test Data", "browser" => "Unit Test Data", "operating_system" => "Unit Test Data", "device" => "Unit Test Data", "severity" => "Unit Test Data", "reproduce" => "Unit Test Data", "description" => "Unit Test Data", "flagged" => "Unit Test Data", "fixed" => "Unit Test Data" ) );

    protected function _before()
    {
        $this->_model = new bugs_model();
    }

    protected function _after() {}

    public function testInstantiation ()
    {
        $this->assertInstanceOf ( 'bugs_model', $this->_model );
    }

    public function testSaveWithoutClients_contacts_id() {
                unset ( $this->_data[ "bugs" ][ "clients_contacts_id" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutUrl() {
                unset ( $this->_data[ "bugs" ][ "url" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutBrowser() {
                unset ( $this->_data[ "bugs" ][ "browser" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutOperating_system() {
                unset ( $this->_data[ "bugs" ][ "operating_system" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutDevice() {
                unset ( $this->_data[ "bugs" ][ "device" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutSeverity() {
                unset ( $this->_data[ "bugs" ][ "severity" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutReproduce() {
                unset ( $this->_data[ "bugs" ][ "reproduce" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutDescription() {
                unset ( $this->_data[ "bugs" ][ "description" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutFlagged() {
                unset ( $this->_data[ "bugs" ][ "flagged" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           public function testSaveWithoutFixed() {
                unset ( $this->_data[ "bugs" ][ "fixed" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "bugs" ] ) );
           }

           

    public function testSaveSuccessful ()
    {
        $this->assertTrue ( $this->_model->save ( $this->_data[ 'bugs' ] ) );
    }
}

?>