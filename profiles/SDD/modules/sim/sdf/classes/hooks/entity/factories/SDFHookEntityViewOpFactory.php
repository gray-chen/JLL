<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookEntityOp.php';
require_once 'sdf/classes/hooks/entity/base/SDFHookEntityViewOp.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityTaskInterface.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityViewTaskInterface.php';

abstract class SDFHookEntityViewOpFactory extends SDFFactory {

    /**
     * Create hook entity view op.
     *
     * @param string $op
     * @param stdclass $entity
     * @param string $viewmode
     * @param string $langcode
     *
     * @return SDFHookEntityViewOp
     */
    public abstract function createOp($op, $entity, $viewmode, $langcode);

}
