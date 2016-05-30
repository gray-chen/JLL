<?php

class SDFHookUserViewTaskExample implements SDFHookEntityViewTaskInterface {

    public function doTask(stdClass $entity, $mode, $langcode, $op) {
        var_dump("user view $entity->uid");
    }

}