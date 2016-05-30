<?php

abstract class SDFHookEntityFormOp extends SDFHookEntityOp {

    protected $form;
    protected $state;

    /**
     * Op Task objects for entity form
     *
     * @var array<SDFHookEntityFormTaskInterface>
     */
    protected $tasks = array();

    public function __construct($entity, $form, &$state, $op) {
        parent::__construct($entity, $op);
        $this->form = $form;
        $this->state = &$state;
    }

    public function invoke() {
        $this->setup();
        foreach ($this->tasks as $task) {
            $task->doTask($this->entity, $this->form, $this->state, $this->op);
        }
    }

    protected function addTask(SDFHookEntityFormTaskInterface $task) {
        $this->tasks[] = $task;
    }

}