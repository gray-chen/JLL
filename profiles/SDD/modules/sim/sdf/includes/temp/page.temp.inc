<?php

function sdf_page_temp() {

    $node = new SDFNode();
    $node->setBundle('homepage');
    $node->loadByName('Home Page');
    var_dump($node->getData());

    $node = new SDFNode();
    $node->setBundle('homepage1');
    $node->loadByName('Home Page');
    var_dump($node->getData());

    return 'test';
}
