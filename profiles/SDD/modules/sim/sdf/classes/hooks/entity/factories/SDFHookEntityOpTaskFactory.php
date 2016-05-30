<?php

require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityTaskInterface.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityDefaultTaskInterface.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityViewTaskInterface.php';
require_once 'sdf/classes/hooks/entity/interfaces/SDFHookEntityFormTaskInterface.php';

class SDFHookEntityOpTaskFactory extends SDFFactory {

    /**
     * Create hook entity op task.
     *
     * @param string $name
     * @param string $type
     *     Entity type, will define the folder where the task class placed.
     *
     * @return SDFHookEntityTaskInterface
     */
    public function createTask($name, $type) {
        $path = "sdf/classes/hooks/entity/{$type}s/tasks";
        switch ($name) {
            case 'node_insert';
                require_once $path . '/SDFHookNodeInsertTask.php';
                return new SDFHookNodeInsertTask();
                break;
            case 'node_view';
                require_once $path . '/SDFHookNodeViewTask.php';
                return new SDFHookNodeViewTask();
                break;
            case 'node_form';
                require_once $path . '/SDFHookNodeFormTask.php';
                return new SDFHookNodeFormTask();
                break;
            default:
                return null;
        }
    }

}
