<?php

function sdf_test_update() {

    $factory = SDFFactoryManager::getUpdateFactory();
    $factory->setModule('sdf');
    $factory->setVersion('0000');

    //module_enable(array('bundle_copy'));

    /* $update = $factory->createUpdate(SDFConst::UPDATE_ENTITY);
    if ($update->validate()) {
        $update->update();
    } */

    /* $update = $factory->createUpdate(SDFConst::UPDATE_VIEWS);
    if ($update->validate()) {
        $update->update();
    } */

    /* $update = $factory->createUpdate(SDFConst::UPDATE_DB);
    if ($update->validate()) {
        $update->update();
    } */

    /* $update = $factory->createUpdate(SDFConst::UPDATE_PHP);
    if ($update->validate()) {
        $update->update();
    } */

    try {
        require_once 'sdf/classes/utils/SDFUpdate.php';
        // Specify the module and version.
        $update = new SDFUpdate('sdf', '0000');
        // Add entity update instance.
        $update->addInstance(SDFConst::UPDATE_ENTITY);
        // Add views update instance.
        $update->addInstance(SDFConst::UPDATE_VIEWS);
        // Add db update instance.
        $update->addInstance(SDFConst::UPDATE_DB);
        // Add php update instace.
        $update->addInstance(SDFConst::UPDATE_PHP);
        // Run update process for all added instances.
        $update->run();
    } catch (Exception $e) {
        var_dump($e->getTrace());
    }

    return 'test update';

}
