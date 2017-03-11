<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Check term permissions edit functionality.');
$I->signInWithAdmin();
$I->amOnPage('admin/structure/taxonomy/manage/tags/add');
$I->doNotSeeErrors();
$I->fillField('name[0][value]', 'Test term name');
$I->fillField('access[user]', 'admin');
$I->checkOption('#edit-access-role-administrator');
$I->checkOption('#edit-access-role-editorial-board');
$I->click('Save');
$I->doNotSeeErrors();
$I->amOnPage('admin/structure/taxonomy/manage/tags/overview');
$I->click('Test term name');
$I->click('#block-bartik-local-tasks > nav > ul > li:nth-child(2) > a');
$I->seeInField('name[0][value]', 'Test term name');
$I->seeInField('access[user]', 'admin (1)');
$I->seeCheckboxIsChecked('#edit-access-role-administrator');
$I->seeCheckboxIsChecked('#edit-access-role-editorial-board');
$I->click('Save');
$I->doNotSeeErrors();
$I->click('Delete');
$I->doNotSeeErrors();
