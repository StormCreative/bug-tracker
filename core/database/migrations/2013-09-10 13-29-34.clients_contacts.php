<?php

if ( class_exists ( "query_builder" ) != TRUE )
    include "cmd/query_builder.php";

if ( class_exists ( "base_build" ) != TRUE )
    include "cmd/base_build.php";

class build_clients_contacts extends base_build
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
                  "title" => array ( "name" => "title",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "email" => array ( "name" => "email",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "password" => array ( "name" => "password",
                                                                  "type" => "varchar",
                                                                  "limit" => "255" ), 
                                                                  "clients_id" => array ( "name" => "clients_id",
                                                                  "type" => "int",
                                                                  "limit" => "11" )
                                                                   );

    public function __Construct ( $db_name, $tablename )
    {
        $this->_tablename = $tablename;
        $this->_db_name = $db_name;

        $this->_build = new query_builder ( $db_name, "clients_contacts" );
    }

    public function put ()
    {
        $this->_build->create_table ( "clients_contacts" );

                    $this->_build->varchar ( "title", "255" );
                    $this->_build->varchar ( "email", "255" );
                    $this->_build->varchar ( "password", "255" );
                    $this->_build->int ( "clients_id", "11" );
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
        $table_exists = mysql_query ( "SHOW TABLES LIKE 'pegisis_clients_contacts'" );

        if ( mysql_num_rows ( $table_exists ) == 0 )
            $this->put ();

        else
            $this->alter ();
    }
}

$build = new build_clients_contacts ( $this->_db_name, "clients_contacts" );
$build->desc ();

?>