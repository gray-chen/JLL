<?php

class SDFHookBlockDelta1Save implements SDFHookBlockSaveInterface {

    public function save(array $edit) {
        var_dump($edit);
    }

}
