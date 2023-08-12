<?php
namespace App\Repositories;
use App\Interfaces\ManageInterface;

class ManageRepository implements ManageInterface {
    public function retrieveUserInfo() {
        $user = auth()->user();
        var_dump($user);
        die;
    }
}