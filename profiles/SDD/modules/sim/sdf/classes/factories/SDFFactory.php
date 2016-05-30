<?php

abstract class SDFFactory {

    /**
     * Loaded factories.
     *
     * @var array <SDFFactory>
     */

    protected static $factories = array();

    protected function __construct() {

    }

    /**
     * Get factory instance
     *
     * @param string $class Class name
     *
     * @return SDFFactory
     */
    public static function instance($class) {
        if (empty(self::$factories[$class])) {
            self::$factories[$class] = new $class();
        }
        return self::$factories[$class];
    }

}
