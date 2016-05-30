<?php

require_once 'sdf/classes/structs/SDFStruct.php';
require_once 'sdf/classes/structs/SDFClassStruct.php';
require_once 'sdf/classes/structs/SDFEntityStruct.php';
require_once 'sdf/classes/exceptions/SDFStructException.php';

class SDFStructFactory extends SDFFactory {

    /**
     * Create an entity struct
     *
     * @param string $name Name of struct
     *
     * @throws SDFEntityStructException
     *
     * @return SDFStruct
     */
    public function createStruct($name) {
        $path = 'sdf/classes/structs/';
        switch ($name) {
            case 'node':
                require_once $path . 'SDFNodeStruct.php';
                return new SDFNodeStruct();
                break;
            case 'term':
                require_once $path . 'SDFTermStruct.php';
                return new SDFTermStruct();
                break;
            case 'user':
                require_once $path . 'SDFUserStruct.php';
                return new SDFUserStruct();
                break;
            case 'folder':
                require_once $path . 'SDFFolderStruct.php';
                return new SDFFolderStruct();
                break;
            case 'hook':
                require_once $path . 'SDFHookStruct.php';
                return new SDFHookStruct();
                break;
            default:
                $error = SDFStr::get('EXCEPTION_ENTITY_STRUCT_NOT_FOUND',
                        array('!name' => $name));
                throw new SDFEntityStructException($error);
                return NULL;
        }
    }

}
