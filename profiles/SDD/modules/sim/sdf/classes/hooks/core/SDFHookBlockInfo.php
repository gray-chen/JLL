<?php

class SDFHookBlockInfo extends SDFHook {

    public function invoke() {
        $blocks['delta1'] = array(
            'info' => t('Delta1'),
            'cache' => DRUPAL_NO_CACHE,
        );

        return $blocks;
    }

}
