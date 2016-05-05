<?php

namespace Application\Model\Repository;

abstract class Repository {

    protected $default_filename = './db/json/database.json';
    
    public function getDefaultFilename() {
        return $this->default_filename;
    }

    protected function getJsonContent($filename) {
        $json_content = file_get_contents($filename);
        return json_decode($json_content, true);
    }

    protected function setJsonContent($content, $filename) {
        if ($content) {
            $json_data = json_encode($content);
            file_put_contents($filename, $json_data);
            return true;
        }
        return false;
    }

    public function getTable($name, $filename) {
        $json_array = $this->getJsonContent($filename);
        return $json_array[$name];
    }
    
    public function autoIncrement($tablename, $field) {
        $table = $this->getTable($tablename, $this->default_filename);
        if (isset(end($table)[$field])) {
            $last = end($table)[$field];
        }       
        return $last + 1;
    }

    public function retrieve($tablename, $item, $value) {
        $table = $this->getTable($tablename, $this->default_filename);
        $key = array_search($value, array_column($table, $item));
        if ($key === false) {
            return false;
        }
        return $table[$key];
    }

    public function search($tablename, $item, $value) {
        if ($this->retrieve($tablename, $item, $value)) {
            return true;
        }
        return false;
    }
    
    public function delete($tablename, $item, $value) {
        if ($this->search($tablename, $item, $value)) {
            $content = $this->getJsonContent($this->default_filename);
            $table = $content[$tablename];
            $key = array_search($value, array_column($table, $item));           
            unset($content[$tablename][$key]);
            $content[$tablename] = array_values($content[$tablename]);
            return $this->setJsonContent($content, $this->default_filename); 
        }
        return false;
    }

}
