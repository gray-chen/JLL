<?php

abstract class SDFHookBlock extends SDFHook {

    /**
     * Block view op
     *
     * @var SDFHookBlockViewInterface
     */
    protected $viewOp;

    /**
     * Block save op
     *
     * @var SDFHookBlockSaveInterface
     */
    protected $saveOp;

    /**
     * Block configure op
     *
     * @var SDFHookBlockConfigureInterface
     */
    protected $configureOp;

    /**
     * Op string
     *
     * @var string
     */
    protected $op;

    /**
     * Delta of block
     *
     * @var string
     */
    protected $delta;

    /**
     * The submitted form data from the configuration form.
     *
     * @var array
     */
    protected $edit;

    protected $opFactory;

    public function __construct($delta, $op, $edit = array()) {
        $this->op = $op;
        $this->delta = $delta;
        $this->edit = $edit;
    }

    public function invoke() {
        $this->setup();
        if ($this->op == 'view') {
            return $this->viewOp->view();
        } else if ($this->op == 'save') {
            return $this->saveOp->save($this->edit);
        } else if ($this->op == 'configure') {
            return $this->configureOp-> configure();
        }
    }

    protected abstract function setup();

}
