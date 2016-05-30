<?php

class SDFDBUpdate extends SDFBaseUpdate {

    private $extensions = array(
        'sql',
        //'gz',
        //'zip'
    );

    public function validate() {
        if (!$this->requireModule('backup_migrate')) {
            $e = SDFStr::get('EXCEPTION_UPDATE_MODULE_NOT_FOUND', array(
                '!name' => 'DB', '!module' => 'backup_migrate'
            ));
            throw new SDFUpdateException($e);
            return FAlSE;
        }

        if (!$this->requireFolder('db')) {
            $e = SDFStr::get('EXCEPTION_UPDATE_FOLDER_NOT_FOUND', array(
                '!name' => 'DB', '!folder' => 'db'
            ));
            throw new SDFUpdateException($e);
            return FAlSE;
        }

        return TRUE;
    }

    public function update() {
        $dir = $this->scanDir('db');
        if (empty($dir)) {
            $e = SDFStr::get('EXCEPTION_UPDATE_FOLDER_NO_FILE', array(
                '!name' => 'DB', '!folder' => 'db'
            ));
            throw new SDFUpdateException($e);
        }
        $path = $this->getUpdatePath('db');

        foreach ($dir as $file) {
            $source = $path . $file;
            if (!$this->validExtension($source, $this->extensions)) {
                $e = SDFStr::get('EXCEPTION_UPDATE_INVALID_EXTENSION', array(
                    '!name' => 'DB', '!file' => $file
                ));
                throw new SDFUpdateException($e);
            }
            if (!$this->validContent($source)) {
                $e = SDFStr::get('EXCEPTION_UPDATE_CONTENT_EMPTY', array(
                    '!name' => 'DB', '!file' => $file
                ));
                throw new SDFUpdateException($e);
            }
            $location = $this->getBackupLocation();
            $dest = SDFPath::getFileSystemPath($location) . '/' . $file;
            backup_migrate_include('crud');
            copy($source, $dest);
            backup_migrate_perform_restore('manual', $file);
            unlink($dest);
        }
    }

    /**
     * Get the backup location from backup_migrate.
     *
     * @return string
     */
    private function getBackupLocation() {
        $q = db_select('backup_migrate_destinations');
        $fields = array(
            'location'
        );
        $q->fields('backup_migrate_destinations', $fields)->condition('destination_id', 'manual');
        $r = $q->execute();
        $row = $r->fetchAll();
        $location = '';
        if (empty($row)) {
            // Default backup location for manual.
            $location = 'private://backup_migrate/manual';
        } else {
            // Custom backup location for manual.
            $location = $row[0]->location;
        }
        return $location; //SDFPath::getFileSystemPath($location);
    }

    private function gzDecode($source) {
        if (function_exists("gzopen")) {
            $dest = uniqid($source) . '.sql';
            if (($out = fopen($dest, 'wb')) && ($in = gzopen($source, 'rb'))) {
                while (!feof($in)) {
                    fwrite($out, gzread($in, 1024 * 512));
                }
            }
            gzclose($in);
            fclose($out);
            return $dest;
        } else {
            $e = SDFStr::get('EXCEPTION_UPDATE_COMPRESSION_NOT_SUPPORT', array(
                '!name' => 'DB', '!file' => $source
            ));
            throw new SDFUpdateException($e);
        }
    }

    private function zipDecode($source) {
        if (class_exists('ZipArchive')) {
            $zip = new ZipArchive();
            $dest = uniqid($source) . '.sql';
            $res = $zip->open($dest, constant("ZipArchive::CREATE"));
            if ($res === TRUE) {
                $zip->addFile($source, $filename);
                $success = $zip->close();
            }
        } else {
            $e = SDFStr::get('EXCEPTION_UPDATE_COMPRESSION_NOT_SUPPORT', array(
                    '!name' => 'DB', '!file' => $source
            ));
            throw new SDFUpdateException($e);
        }
        return $success;
    }

}
