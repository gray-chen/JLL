<?php

function sdf_test_entity() {

    /* $node = new SDFNode();
    $node->setBundle('homepage');
    $node->loadByName('Home Page');
    var_dump($node->getObject()); */

    /* $node = new SDFNode(3);
    var_dump($node->getNid());
    var_dump($node->getTitle());
    var_dump($node->getBundle());
    var_dump($node->getWrapper()->field_aaa->value());
    var_dump($node->getData()); */

    require_once 'project/classes/business/users/ProjectDefaultUserBusiness.php';
    require_once 'project/classes/business/users/ProjectTestUserBusiness.php';

    $user = new ProjectDefaultUserBusiness();
    $user->loadById(7);
    var_dump($user->getRoles());
    $user->addRole(SDFConst::USER_EDITOR);
    $user->save();

    $user->setRoles(array(5));
    $user->save();

    return '';
}

