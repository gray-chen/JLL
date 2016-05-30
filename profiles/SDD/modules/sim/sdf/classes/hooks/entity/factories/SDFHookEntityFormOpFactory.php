<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookEntityOp.php';
require_once 'sdf/classes/hooks/entity/base/SDFHookEntityFormOp.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityTaskInterface.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityFormTaskInterface.php';

abstract class SDFHookEntityFormOpFactory extends SDFFactory {

    /**
     * Create hook entity form op.
     *
     * @param string $op
     * @param stdclass $entity
     * @param string $entityType
     *     Entity type, will define the folder where the task class placed.
     *
     * @return SDFHookEntityFormOp
     */
    public abstract function createOp($op, $entity, $form, &$state);

}
