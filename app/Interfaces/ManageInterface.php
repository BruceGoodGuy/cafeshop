<?php
namespace App\Interfaces;

interface ManageInterface {
    public function retrieveUserInfo();
    public function updateProfile($data);
    public function addCategory($data);
    public function getCategories($condition, $selects);
    public function getCategory($id);
    public function updateCategory($data);
    public function deleteCategory($id);
    public function saveProduct($data);
}