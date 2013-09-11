<?php

if ( class_exists ( "query_builder" ) != TRUE )
    include "cmd/query_builder.php";

if ( class_exists ( "base_build" ) != TRUE )
    include "cmd/base_build.php";

class build_bugs extends base_build
{
    private $_builder;

    protected $_schema = array ( "id" => array ( "name" => "id",
                                           "type" => "int",
                                           "limit" => "11" ),
                           "create_date" => array ( "name" => "create_date",
                                                    "type" => "timestamp",
                                                    "limit" => "" ),
                           "approved" => array ( "name" => "approved",
                                                 "type" => "int",
                                                 "limit" => "11" ),
                  "image_id" => array ( "name" => "image_id",
                                              "type" => "int",
                                              "limit" => "11" ),"clients_contacts_id" => array ( "name" => "clients_contacts_id",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "url" => array ( "name" => "url",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "browser" => array ( "name" => "browser",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "operating_system" => array ( "name" => "operating_system",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "device" => array ( "name" => "device",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "severity" => array ( "name" => "severity",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "reproduce" => array ( "name" => "reproduce",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "description" => array ( "name" => "description",
                                                                  "type" => "text",
                                                                  "limit" => "" ), 
                                                                  "flagged" => array ( "name" => "flagged",
                                                                  "type" => "int",
                                                                  "limit" => "11" ), 
                                                                  "fixed" => array ( "name" => "fixed",
                                                                  "type" => "int",
                                                                  "limit" => "11" ),
                                                                  "assigned" => array ( "name" => "assigned",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ),
                                                                  "summary" => array ( "name" => "summary",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ),
                                                                  "clients_id" => array ( "name" => "clients_id",
                                                                  "type" => "int",
                                                                  "limit" => "11" ),
                                                                  "closed" => array ( "name" => "closed",
                                                                  "type" => "int",
                                                                  "limit" => "11" )
                                                                   );

    public function __Construct ( $db_name, $tablename )
    {
        $this->_tablename = $tablename;
        $this->_db_name = $db_name;

        $this->_build = new query_builder ( $db_name, "bugs" );
    }

    public function put ()
    {
        $this->_build->create_table ( "bugs" );

                    $this->_build->varchar ( "clients_contacts_id", "255" );
                    $this->_build->varchar ( "url", "255" );
                    $this->_build->varchar ( "browser", "255" );
                    $this->_build->varchar ( "operating_system", "255" );
                    $this->_build->varchar ( "device", "255" );
                    $this->_build->varchar ( "severity", "255" );
                    $this->_build->int ( "image_id", "11");
                    $this->_build->varchar ( "reproduce", "255" );
                    $this->_build->text ( "description" );
                    $this->_build->int ( "flagged", "11" );
                    $this->_build->int ( "fixed", "11" );
        $this->_build->timestamp ( "create_date" );
        $this->_build->run ();
    }


    /**
     * Method to decide whether to create the whole table or to send it to the method so it can be altered
     *
     * @access public
     */
    public function desc ()
    {
        $table_exists = mysql_query ( "SHOW TABLES LIKE 'bug_tracker_bugs'" );

        if ( mysql_num_rows ( $table_exists ) == 0 )
            $this->put ();

        else
            $this->alter ();
    }
}

$build = new build_bugs ( $this->_db_name, "bugs" );
$build->desc ();

?>