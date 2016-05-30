<?php

class SDFHookMenu extends SDFHook {

    public function invoke() {

        $items = array();

        $items['admin/sdf/struct'] = array(
            'title' => 'Struct',
            'description' => 'Auto-create module and folder+class structure.',
            'page callback' => 'drupal_get_form',
            'page arguments' => array(
                'sdf_struct_form'
            ),
            'access arguments' => array(
                'administer content types'
            ),
            'file' => 'includes/admin/admin.sdf_struct.inc',
            'menu_name' => 'menu-administration-menu'
        );

        $items['admin/sdf/temp'] = array(
            'title' => 'Temp',
            'description' => 'Temp page to do everything.',
            'page callback' => 'sdf_page_temp',
            'access arguments' => array(
                'administer content types'
            ),
            'file' => 'includes/temp/page.temp.inc',
            'menu_name' => 'menu-administration-menu'
        );

        $tests = array(
            'update',
            'entity',
            'struct',
        );
        foreach ($tests as $test) {
            $items['admin/sdf/tests/' . $test] = array(
                'title' => 'Test ' . $test,
                'description' => 'Test ' . $test,
                'page callback' => 'sdf_test_' . $test,
                'access arguments' => array(
                    'administer content types'
                ),
                'file' => 'includes/tests/test.sdf_' . $test . '.inc',
                'menu_name' => 'menu-administration-menu'
            );
        }

        return $items;

    }

}
