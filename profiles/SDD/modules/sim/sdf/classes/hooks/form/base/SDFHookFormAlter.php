<?php

abstract class SDFHookFormAlter extends SDFHook {

    /**
     * Form id
     *
     * @var string
     */
    protected $formId;

    /**
     * Drupal form array
     *
     * @var array
     */
    protected $form;

    /**
     * Drupal form state
     *
     * @var array
     */
    protected $formState;

    /**
     * Form alter objects
     *
     * @var array<SDFHookFormAlterInterface>
     */
    protected $alters = array();

    protected $alterFactory;

    public function __construct(&$form, $formState, $formId) {
        $this->form = &$form;
        $this->formState = $formState;
        $this->formId = $formId;
        $this->alterFactory = SDFFactoryManager::getHookFormAlterFactory();
    }

   protected abstract function setup();

   protected function addAlter(SDFHookFormAlterInterface $alter) {
       $this->alters[] = $alter;
   }

   protected function addAlterByName($name) {
        $alter = $this->alterFactory->createAlter($name);
        $this->addAlter($alter);
   }

   public function invoke() {
       $this->setup();

       foreach ($this->alters as $alter) {
           /* @var $alter SDFHookFormAlterInterface */
           $alter->alter($this->form, $this->formState, $this->formId);
       }
   }

}