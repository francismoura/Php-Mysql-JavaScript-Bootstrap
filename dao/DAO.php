<?php

interface DAO
{
    public function insert($data);

    public function findUnit($id);

    public function findAll();

    public function update($id);

    public function delete($id);
}
