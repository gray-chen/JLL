<?php

abstract class SDFHookEntityViewOp extends SDFHookEntityOp {

    protected $mode;
    protected $langcode;

    /**
     * Op Task objects for node view
     *
     * @var array<SDFHookEntityViewTaskInterface>
     */
    protected $tasks = array();

    public function __construct($entity, $mode, $langcode, $op = 'view') {
        parent::__construct($entity, $op);
        $this->mode = $mode;
        $this->langcode = $langcode;
    }

    public function invoke() {
        $this->setup();
        foreach ($this->tasks as $task) {
            $task->doTask($this->entity, $this->mode, $this->langcode, $this->op);
        }
    }

    protected function addTask(SDFHookEntityViewTaskInterface $task) {
        $this->tasks[] = $task;
    }

}