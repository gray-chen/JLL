<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookEntityOp.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityTaskInterface.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityDefaultTaskInterface.php';

abstract class SDFHookEntityOpFactory extends SDFFactory {

    /**
     * Create hook entity default op.
     *
     * @param string $op
     * @param stdclass $entity
     *
     * @return SDFHookEntityOp
     */
    public abstract function createOp($op, $entity);

}
