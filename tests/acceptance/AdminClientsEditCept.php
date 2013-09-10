<?php

$I = new WebGuy($scenario);
$I->wantTo('Test the clients edit page');
$I->amOnPage('admin/clients/edit');

/** First check form cannot be sent if the user doesnt input any values **/
$I->amGoingTo('Submit user form with invalid values');
$I->click('Save');

$I->see("Title can not be empty");
            $I->see("Url can not be empty");
            

$I->amGoingTo("Submit clients form without a title");
                                        $I->click("Save");
                                        $I->fillField ( "clients[url]", "Acceptance Test" );
                        $I->amGoingTo("Submit clients form without a url");
                                        $I->click("Save");
                                        $I->fillField ( "clients[title]", "Acceptance Test" );
                        

?>