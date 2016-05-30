<?php

class SDFHookTermViewTaskExample implements SDFHookEntityViewTaskInterface {

    public function doTask(stdClass $entity, $mode, $langcode, $op) {
        var_dump("term view $entity->tid");
    }

}