<?php

require_once 'sdf/classes/exceptions/SDFEntityException.php';

abstract class SDFEntity {

    /**
     * Entity wrapper
     *
     * @var EntityDrupalWrapper
     */

    protected $wrapper;

    /**
     * Entity type
     *
     * @var string
     */
    protected $type;

    /**
     * Entity bundle
     *
     * @var string
     */
    protected $bundle;

    /**
     * The field for the entity name. Defaul to "name".
     * e.g. node field "title" is its name, term field "name" is its name.
     *
     * @var string
     */
    protected $nameField = 'name';

    /**
     * Actual data for the entity
     *
     * @var stdclass
     */
    protected $data;

    /**
     * Constructor
     * Nothing to do, let developers call the right function to load/create entity.
     */
    public function __construct() {

    }

    /**
     * Init the entity object.
     */
    protected abstract function init();

    /**
     * Load the entity object.
     *
     * @param integer $id Id of the entity.
     */
    protected abstract function load($id);

    /**
     * Load entity by id
     *
     * @param integer $id
     * @throws SDFEntityException
     */
    public function loadById($id) {
        if (!is_integer($id)) {
            $e = SDFStr::get('EXCEPTION_ENTITY_FUNC_PARAM_TYPE_NOT_MATCH', array(
                '!func' => 'loadById', '!type' => 'integer', '!param' => '$id'
            ));
            throw new SDFEntityException($e);
        }
        
        $this->load($id);
        $this->initWrapper();
    }

    /**
     * Load entity by name
     *
     * @param string $name
     * @throws SDFEntityException
     * @see loadByConditions
     */
    public function loadByName($name) {
        if (!is_string($name)) {
            $e = SDFStr::get('EXCEPTION_ENTITY_FUNC_PARAM_TYPE_NOT_MATCH', array(
                '!func' => 'loadByName', '!type' => 'string', '!param' => '$name'
            ));
            throw new SDFEntityException($e);
        }

        // Drupal 7 provides some function like _load_multiple with a parameter $conditions,
        // thus we can simply pass $name to $conditions,
        // but, this _load_multiple function is deprecated, and will be removed in Drupal 8.
        // Recommanded way to load with conditions is using EntityFieldQuery.
        $conditions = array();
        // If bundle is set, search name within this bundle.
        if ($this->bundle) {
            $conditions['type'] = $this->bundle;
        }
        $conditions[$this->nameField] = $name;
        $this->loadByConditions($conditions);
    }
    
    /**
     * Load entities by conditions.
     *
     * @param array $conditions A set of key-value conditions
     *
     * @return array
     */
    public function loadByConditions(array $conditions) {
        $query = new EntityFieldQuery();
        $query = $query->entityCondition('entity_type', $this->type);
        foreach ($conditions as $key => $value) {
            $query = $query->propertyCondition($key, $value);
        }
        $results = $query->execute();
        if (empty($results)) {
            $e = SDFStr::get('EXCEPTION_ENTITY_LOAD_NO_RESULT', array(
                '!conditions' => serialize($conditions)
            ));
            throw new SDFEntityException($e);
        }
        $results = array_keys($results[$this->type]);
        $this->load($results[0]);
        $this->initWrapper();
    }

    /**
     * Init the entity object.
     */
    public function create() {
    	$this->data = new stdClass();
        $this->init();
        $this->initWrapper();
    }

    /**
     * Save the entity object.
     */
    public function save() {
        $this->wrapper->save();
    }

    /**
     * Delete the entity object.
     */
    public function delete() {
        $this->wrapper->delete();
    }
    
    public function setObject(stdClass $object) {
    	$this->data = $object;
    	$this->initWrapper();
    }
    
    public function getObject() {
    	return $this->data;
    }

    public function setBundle($bundle) {
        $this->bundle = $bundle;
        $this->data->bundle = $bundle;
    }

    public function getBundle() {
        return $this->bundle;
    }
    
    private function initWrapper() {
    	$this->wrapper = entity_metadata_wrapper($this->type, $this->data);
    }

}
