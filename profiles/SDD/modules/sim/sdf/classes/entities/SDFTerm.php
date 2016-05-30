<?php

class SDFTerm extends SDFEntity {

    public function __construct() {
        $this->type = 'taxonomy_term';
        parent::__construct();
    }

    protected function init() {
        $this->data = new stdClass();
    }

    protected function load($tid) {
        $term = taxonomy_term_load($tid);
        if ($term) {
        	$this->data = $term;
        }
        
        // TODO throw exception?
    }

}
