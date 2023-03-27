<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Training_program_model extends CRUD_model {

    public function __construct() {
        parent::__construct();
        $this->table_name="training_program";
        $this->field="id";
    }
}
?>