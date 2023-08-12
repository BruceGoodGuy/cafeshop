<?php
namespace App\Interfaces;

interface UserInterface {
    public function authentication(array $data);
    public function resetPassword(array $data);
    public function updatePassword(array $data);
}