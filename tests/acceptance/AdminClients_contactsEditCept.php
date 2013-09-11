<?php

$I = new WebGuy($scenario);
$I->wantTo('Test the clients_contacts edit page');
$I->amOnPage('admin/clients_contacts/edit');

/** First check form cannot be sent if the user doesnt input any values **/
$I->amGoingTo('Submit user form with invalid values');
$I->click('Save');

$I->see("Title can not be empty");
            $I->see("Email can not be empty");
            $I->see("Password can not be empty");
            $I->see("Clients_id can not be empty");
            

$I->amGoingTo("Submit clients_contacts form without a title");
                                        $I->click("Save");
                                        $I->fillField ( "clients_contacts[email]", "Acceptance Test" );
                        $I->fillField ( "clients_contacts[password]", "Acceptance Test" );
                        $I->fillField ( "clients_contacts[clients_id]", "Acceptance Test" );
                        $I->amGoingTo("Submit clients_contacts form without a email");
                                        $I->click("Save");
                                        $I->fillField ( "clients_contacts[title]", "Acceptance Test" );
                        $I->fillField ( "clients_contacts[password]", "Acceptance Test" );
                        $I->fillField ( "clients_contacts[clients_id]", "Acceptance Test" );
                        $I->amGoingTo("Submit clients_contacts form without a password");
                                        $I->click("Save");
                                        $I->fillField ( "clients_contacts[title]", "Acceptance Test" );
                        $I->fillField ( "clients_contacts[email]", "Acceptance Test" );
                        $I->fillField ( "clients_contacts[clients_id]", "Acceptance Test" );
                        $I->amGoingTo("Submit clients_contacts form without a clients_id");
                                        $I->click("Save");
                                        $I->fillField ( "clients_contacts[title]", "Acceptance Test" );
                        $I->fillField ( "clients_contacts[email]", "Acceptance Test" );
                        $I->fillField ( "clients_contacts[password]", "Acceptance Test" );
                        

?>