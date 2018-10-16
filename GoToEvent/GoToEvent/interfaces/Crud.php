<?php
  namespace interfaces;
  /**
   *
   */

  interface Crud
  {
    public function create($objeto);
    public function read($id);
    public function update ($objeto);
    public function delete($id);
    public function readAll();
  }


 ?>