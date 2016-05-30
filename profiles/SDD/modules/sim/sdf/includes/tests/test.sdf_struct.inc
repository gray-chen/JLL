<?php

function sdf_test_struct() {

    $factory = SDFFactoryManager::getStructFactory(SDFConst::FACTORY_STRUCT);

    /* $struct = $factory->createStruct(SDFConst::STRUCT_FOLDER);
    $struct->setModule('project');
    $struct->createFolderStruct();

    $struct = $factory->createStruct(SDFConst::STRUCT_NODE);
    $struct->setClassPrefix('Project');
    $struct->setModule('project');
    $struct->createClassStruct();

    $struct = $factory->createStruct(SDFConst::STRUCT_TERM);
    $struct->setClassPrefix('Project');
    $struct->setModule('project');
    $struct->createClassStruct(); */

    $struct = $factory->createStruct(SDFConst::STRUCT_USER);
    $struct->setClassPrefix('Project');
    $struct->setModule('project');
    $struct->createClassStruct();

}