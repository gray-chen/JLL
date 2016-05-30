<?php

require_once 'sdf/classes/hooks/base/SDFHook.php';

class SDFHookInit extends SDFHook {

    public function invoke() {
        require_once 'sdf/classes/entities/SDFEntity.php';
        require_once 'sdf/classes/entities/SDFNode.php';
        require_once 'sdf/classes/entities/SDFUser.php';
        require_once 'sdf/classes/entities/SDFTerm.php';

        require_once 'sdf/classes/factories/SDFFactoryManager.php';
        require_once 'sdf/classes/consts/SDFConst.php';
        require_once 'sdf/classes/consts/SDFConstList.php';
        require_once 'sdf/classes/utils/SDFStr.php';
        require_once 'sdf/classes/utils/SDFPath.php';

        SDFStr::load('exception');
    }

}
