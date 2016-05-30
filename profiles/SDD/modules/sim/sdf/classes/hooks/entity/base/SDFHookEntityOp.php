<?php

abstract class SDFHookEntityOp extends SDFHook {

    /**
     * Drupal entity object
     *
     * @var stdClass
     */
    protected $entity;

    /**
     * Op string
     *
     * @var string
     */
    protected $op;

    /**
     * Op Task objects for default
     *
     * @var array<SDFHookEntityDefaultTaskInterface>
     */
    protected $tasks = array();

    public function __construct($entity, $op) {
        $this->entity = $entity;
        $this->op = $op;
    }

    public function invoke() {
        $this->setup();
        foreach ($this->tasks as $task) {
            $task->doTask($this->entity, $this->op);
        }
    }

    protected function addTask(SDFHookEntityDefaultTaskInterface $task) {
        $this->tasks[] = $task;
    }

    /**
     * Add hook entity op task by name
     *
     * @param string $name Class name
     */
    protected function addTaskByName($name) {
        $task = $this->createTask($name);
        $this->addTask($task);
    }

    protected abstract function setup();

    protected abstract function createTask($name);

}