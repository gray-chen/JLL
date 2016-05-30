<?php

require_once 'sdf/classes/hooks/block/ops/SDFHookBlockDelta1View.php';
require_once 'sdf/classes/hooks/block/ops/SDFHookBlockDelta1Save.php';
require_once 'sdf/classes/hooks/block/ops/SDFHookBlockDelta1Configure.php';

class SDFHookBlockDelta1 extends SDFHookBlock {

    protected function setup() {
        if ($this->op == 'view') {
            $this->viewOp = new SDFHookBlockDelta1View();
        } else if ($this->op == 'save') {
            $this->saveOp = new SDFHookBlockDelta1Save();
        } else if ($this->op == 'configure') {
            $this->configureOp = new SDFHookBlockDelta1Configure();
        }
    }

}
