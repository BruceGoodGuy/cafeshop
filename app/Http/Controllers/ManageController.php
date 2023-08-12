<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ManageInterface;

class ManageController extends Controller
{
    private ManageInterface $manageRepository;
    //

    public function __construct(ManageInterface $manageRepository) {
        $this->manageRepository = $manageRepository;
    }


    public function index() {
        $userInfo = $this->manageRepository->retrieveUserInfo();
        return view('back.dashboard');
    }
}
