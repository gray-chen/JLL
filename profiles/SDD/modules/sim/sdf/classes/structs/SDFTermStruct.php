<?php

class SDFTermStruct extends SDFEntityStruct {

    public function __construct() {
        parent::__construct('taxonomy_term', 'taxonomy', 'Term');
    }

}