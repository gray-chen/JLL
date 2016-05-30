<?php

class SDFHookNodeInsertTaskExample implements SDFHookEntityDefaultTaskInterface {

    public function doTask(stdClass $entity, $op) {
        var_dump("node insert $entity->nid");
    }

}
