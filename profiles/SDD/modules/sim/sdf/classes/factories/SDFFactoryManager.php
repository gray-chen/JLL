<?php

require_once 'sdf/classes/exceptions/SDFFactoryException.php';
require_once 'sdf/classes/factories/SDFFactory.php';
require_once 'sdf/classes/hooks/entity/factories/SDFHookEntityOpFactory.php';
require_once 'sdf/classes/hooks/entity/factories/SDFHookEntityViewOpFactory.php';
require_once 'sdf/classes/hooks/entity/factories/SDFHookEntityFormOpFactory.php';

class SDFFactoryManager {

    /**
     * Get entity struct factory.
     *
     * @return SDFStructFactory
     */
    public static function getStructFactory() {
        return self::getFactory('struct');
    }

    /**
     * Get update factory.
     *
     * @return SDFUpdateFactory
     */
    public static function getUpdateFactory() {
        return self::getFactory('update');
    }

    /**
     * The map between op to op type
     */
    public static final function getHookEntityOpMap() {
        $map = array(
            // Op => default op
            'insert' => 'default',
            'update' => 'default',
            'delete' => 'default',
            'presave' => 'default',
            'prepare' => 'default',
            // Op => form op
            'submit' => 'form',
            'validate' => 'form',
            // Op => view op
            'view' => 'view',
        );
        return $map;
    }

    /**
     * Get hook entity op factory
     *
     * @param string $entityType
     * @param string $op
     *
     * @return SDFHookEntityOpFactory|SDFHookEntityViewOpFactory|SDFHookEntityFormOpFactory
     */
    public static function getHookEntityOpFactory($entityType, $op) {
        $opType = '';
        $map = self::getHookEntityOpMap();
        if (isset($map[$op])) {
            $opType = $map[$op];
        }
        return self::getFactory('entity_op_' . $entityType . '_' . $opType);
    }

    /**
     * Get hook form factory
     *
     * @return SDFHookFormFactory
     */
    public static function getHookFormFactory() {
        return self::getFactory('form');
    }

    /**
     * Get hook form alter factory
     *
     * @return SDFHookFormAlterFactory
     */
    public static function getHookFormAlterFactory() {
        return self::getFactory('form_alter');
    }

    /**
     * Get hook block factory
     *
     * @return SDFHookBlockFactory
     */
    public static function getHookBlockFactory() {
        return self::getFactory('block');
    }

    /**
     * Get a factory.
     *
     * @param string $name Name of factory.
     *
     * @return SDFFactory
     */
    private static function getFactory($name) {
        $factory = NULL;
        switch ($name) {
            case 'entity_op_node_default':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookNodeOpFactory.php';
                $factory = SDFHookNodeOpFactory::instance('SDFHookNodeOpFactory');
                break;
            case 'entity_op_node_view':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookNodeViewOpFactory.php';
                $factory = SDFHookNodeViewOpFactory::instance('SDFHookNodeViewOpFactory');
                break;
            case 'entity_op_node_form':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookNodeFormOpFactory.php';
                $factory = SDFHookNodeFormOpFactory::instance('SDFHookNodeFormOpFactory');
                break;
            case 'entity_op_term_default':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookTermOpFactory.php';
                $factory = SDFHookTermOpFactory::instance('SDFHookTermOpFactory');
                break;
            case 'entity_op_term_view':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookTermViewOpFactory.php';
                $factory = SDFHookTermViewOpFactory::instance('SDFHookTermViewOpFactory');
                break;
            case 'entity_op_term_form':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookTermFormOpFactory.php';
                $factory = SDFHookTermFormOpFactory::instance('SDFHookTermFormOpFactory');
                break;
            case 'entity_op_user_default':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookUserOpFactory.php';
                $factory = SDFHookUserOpFactory::instance('SDFHookUserOpFactory');
                break;
            case 'entity_op_user_view':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookUserViewOpFactory.php';
                $factory = SDFHookUserViewOpFactory::instance('SDFHookUserViewOpFactory');
                break;
            case 'entity_op_user_form':
                require_once 'sdf/classes/hooks/entity/factories/SDFHookUserFormOpFactory.php';
                $factory = SDFHookUserFormOpFactory::instance('SDFHookUserFormOpFactory');
                break;
            case 'form':
                require_once 'sdf/classes/hooks/form/factories/SDFHookFormFactory.php';
                $factory = SDFHookFormFactory::instance('SDFHookFormFactory');
                break;
            case 'form_alter':
                require_once 'sdf/classes/hooks/form/factories/SDFHookFormAlterFactory.php';
                $factory = SDFHookFormAlterFactory::instance('SDFHookFormAlterFactory');
                break;
            case 'struct':
                require_once 'sdf/classes/factories/SDFStructFactory.php';
                $factory = SDFStructFactory::instance('SDFStructFactory');
                break;
            case 'update':
                require_once 'sdf/classes/factories/SDFUpdateFactory.php';
                $factory = SDFUpdateFactory::instance('SDFUpdateFactory');
                break;
            case 'block':
                require_once 'sdf/classes/hooks/block/factories/SDFHookBlockFactory.php';
                $factory = SDFHookBlockFactory::instance('SDFHookBlockFactory');
                break;

            default:
                $error = SDFStr::get('EXCEPTION_FACTORY_NOT_FOUND', array('!name' => $name));
                throw new SDFFactoryException($error);
                return NULL;
        }
        return $factory;
    }

}
