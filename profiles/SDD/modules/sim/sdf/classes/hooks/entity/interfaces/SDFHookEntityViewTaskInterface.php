<?php

interface SDFHookEntityViewTaskInterface extends SDFHookEntityTaskInterface {

    public function doTask(stdClass $entity, $mode, $langcode, $op);

}