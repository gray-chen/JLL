<?php

class SDFConstList {

    public static function listDefaultRoles() {
        return array(
            SDFConst::USER_ANONYMOUS,
            SDFConst::USER_AUTHENTICATED,
            SDFConst::USER_EDITOR,
            SDFConst::USER_WEBMASTER,
        );
    }

}
