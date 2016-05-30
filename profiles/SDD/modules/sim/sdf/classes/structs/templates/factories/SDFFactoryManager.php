
require_once 'sdf/classes/exceptions/SDFFactoryException.php';
require_once 'sdf/classes/factories/SDFFactory.php';
require_once 'sdf/classes/hooks/entity/factories/SDFHookEntityOpFactory.php';
require_once 'sdf/classes/hooks/entity/factories/SDFHookEntityViewOpFactory.php';
require_once 'sdf/classes/hooks/entity/factories/SDFHookEntityFormOpFactory.php';

class $SDF$FactoryManager {

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
        $map = SDFFactoryManager::getHookEntityOpMap();
        if (isset($map[$op])) {
            $opType = $map[$op];
        }
        return self::getFactory('entity_op_' . $entityType . '_' . $opType);
    }

    /**
     * Get hook form factory
     *
     * @return $SDF$HookFormFactory
     */
    public static function getHookFormFactory() {
        return self::getFactory('form');
    }

    /**
     * Get hook form alter factory
     *
     * @return $SDF$HookFormAlterFactory
     */
    public static function getHookFormAlterFactory() {
        return self::getFactory('form_alter');
    }

    /**
     * Get hook block factory
     *
     * @return $SDF$HookBlockFactory
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
                require_once '$sdf$/classes/hooks/entity/factories/$SDF$HookNodeOpFactory.php';
                $factory = $SDF$HookNodeOpFactory::instance('$SDF$HookNodeOpFactory');
                break;
            case 'entity_op_node_view':
                require_once '$sdf$/classes/hooks/entity/factories/$SDF$HookNodeViewOpFactory.php';
                $factory = $SDF$HookNodeViewOpFactory::instance('$SDF$HookNodeViewOpFactory');
                break;
            case 'entity_op_node_form':
                require_once '$sdf$/classes/hooks/entity/factories/$SDF$HookNodeFormOpFactory.php';
                $factory = $SDF$HookNodeFormOpFactory::instance('$SDF$HookNodeFormOpFactory');
                break;
            case 'entity_op_term_default':
                require_once '$sdf$/classes/hooks/entity/factories/$SDF$HookTermOpFactory.php';
                $factory = $SDF$HookTermOpFactory::instance('$SDF$HookTermOpFactory');
                break;
            case 'entity_op_term_view':
                require_once '$sdf$/classes/hooks/entity/factories/$SDF$HookTermViewOpFactory.php';
                $factory = $SDF$HookTermViewOpFactory::instance('$SDF$HookTermViewOpFactory');
                break;
            case 'entity_op_term_form':
                require_once '$sdf$/classes/hooks/entity/factories/$SDF$HookTermFormOpFactory.php';
                $factory = $SDF$HookTermFormOpFactory::instance('$SDF$HookTermFormOpFactory');
                break;
            case 'entity_op_user_default':
                require_once 'sdf/classes/hooks/entity/factories/$SDF$HookUserOpFactory.php';
                $factory = $SDF$HookUserOpFactory::instance('$SDF$HookUserOpFactory');
                break;
            case 'entity_op_user_view':
                require_once '$sdf$/classes/hooks/entity/factories/$SDF$HookUserViewOpFactory.php';
                $factory = $SDF$HookUserViewOpFactory::instance('$SDF$HookUserViewOpFactory');
                break;
            case 'entity_op_user_form':
                require_once '$sdf$/classes/hooks/entity/factories/$SDF$HookUserFormOpFactory.php';
                $factory = $SDF$HookUserFormOpFactory::instance('$SDF$HookUserFormOpFactory');
                break;
            case 'form':
                require_once '$sdf$/classes/hooks/form/factories/$SDF$HookFormFactory.php';
                $factory = $SDF$HookFormFactory::instance('$SDF$HookFormFactory');
                break;
            case 'form_alter':
                require_once '$sdf$/classes/hooks/form/factories/$SDF$HookFormAlterFactory.php';
                $factory = $SDF$HookFormAlterFactory::instance('$SDF$HookFormAlterFactory');
                break;
            case 'block':
                require_once '$sdf$/classes/hooks/block/factories/$SDF$HookBlockFactory.php';
                $factory = $SDF$HookBlockFactory::instance('$SDF$HookBlockFactory');
                break;

            default:
                $error = SDFStr::get('EXCEPTION_FACTORY_NOT_FOUND', array('!name' => $name));
                throw new SDFFactoryException($error);
                return NULL;
        }
        return $factory;
    }

}
