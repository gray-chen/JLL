<?php

class SDFHookNodeViewTaskExample implements SDFHookEntityViewTaskInterface {

    public function doTask(stdClass $entity, $mode, $langcode, $op) {
        var_dump("node view $entity->nid");
    }

}
