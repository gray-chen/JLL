<?php

interface SDFHookEntityDefaultTaskInterface extends SDFHookEntityTaskInterface {

    public function doTask(stdClass $entity, $op);

}