<?php

interface SDFHookEntityFormTaskInterface extends SDFHookEntityTaskInterface {

    public function doTask(stdClass $entity, array $form, array &$state, $op);

}