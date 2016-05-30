<?php

class SDFHookStruct extends SDFClassStruct {

    public function __construct() {
        parent::__construct();
    }

    public function createStruct() {
        $this->requirement();
        $files = array(
            // Blocks
            'hooks/block' => array(
                'HookBlockFactory' => 'factories'
            ),
            // Entities
            'hooks/entity' => array(
                'HookNodeOp' => 'base',
                'HookNodeViewOp' => 'base',
                'HookNodeFormOp' => 'base',
                'HookTermOp' => 'base',
                'HookTermViewOp' => 'base',
                'HookTermFormOp' => 'base',
                'HookUserOp' => 'base',
                'HookUserViewOp' => 'base',
                'HookUserFormOp' => 'base',
                'HookNodeOpFactory' => 'factories',
                'HookNodeViewOpFactory' => 'factories',
                'HookNodeFormOpFactory' => 'factories',
                'HookTermOpFactory' => 'factories',
                'HookTermViewOpFactory' => 'factories',
                'HookTermFormOpFactory' => 'factories',
                'HookUserOpFactory' => 'factories',
                'HookUserViewOpFactory' => 'factories',
                'HookUserFormOpFactory' => 'factories',
            ),
            //Forms
            'hooks/form' => array(
                'HookFormAlterFactory' => 'factories',
                'HookFormFactory' => 'factories',
            ),
            'factories' => array(
                'FactoryManager' => ''
            ),
        );

        foreach ($files as $baseFolder => $files) {
            foreach ($files as $name => $folder) {
                $this->createFromTemplate($name, $folder, $baseFolder);
            }
        }
    }

    private function createFromTemplate($name, $folder, $baseFolder) {
        $content = $this->getTemplateContent($name, $folder, $baseFolder);
        $path = $this->getTargetPath($name, $folder, $baseFolder);
        file_put_contents($path, $content);

    }

    private function getTemplateContent($name, $folder, $baseFolder) {
        $path = drupal_get_path('module', 'sdf') . '/classes/structs/templates';
        $tplPath = $path . '/' . $baseFolder . '/SDF' . $name . '.php';
        if (!file_exists($tplPath)) {
            $e = SDFStr::get('EXCEPTION_HOOK_CLASS_TEMPLATE_NOT_FOUND', array('!name' => $name));
            throw new SDFStructException($e);
        }

        $content = file_get_contents($tplPath);
        // Replace all the "SDF" stuff with the project specific.
        $target = array(
                '$SDF$',
                '$sdf$'
        );
        $replace = array(
                $this->classPrefix,
                $this->module
        );
        // Templates dont have the php tag.
        $content = "<?php\n\n" . str_replace($target, $replace, $content);
        return $content;
    }

    private function getTargetPath($name, $folder, $baseFolder) {
        // Prepend class prefix to file name.
        $name = $this->classPrefix . $name;
        // Write to target folder.
        $targetFolder = 'sites/all/modules/sim/' . $this->module . '/classes/' . $baseFolder;
        if (!empty($folder)) {
            $targetFolder .= '/' . $folder;
        }
        $targetPath = $targetFolder . '/' . $name . '.php';
        return $targetPath;
    }

}
