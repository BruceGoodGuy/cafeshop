<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ManageInterface;
use Illuminate\Support\Facades\View;
use App\Http\Requests\UpdateProfileRequest;
use App\Common\Constant;

class ManageController extends Controller
{
    private ManageInterface $manageRepository;
    //

    public function __construct(ManageInterface $manageRepository) {
        $this->manageRepository = $manageRepository;
    }


    public function index() {
        return view('back.dashboard');
    }

    public function profile() {
        $userInfo = $this->manageRepository->retrieveUserInfo();
        return view('back.user_profile')->with(['userDetail' => $userInfo]);
    }

    public function updateProfile(UpdateProfileRequest $request) {
        $data = $request->only(['name', 'email', 'phonenumber', 'username', 'password', 'location', 'full']);
        $status = $this->manageRepository->updateProfile($data);
        if ($status === Constant::USER_UPDATED) {
            return redirect()->route('profile')->with('success', __($status));
        }

        return redirect()->back()->withInput()->with(['error' => __($status)]);
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }

    public function addProduct() {
        return view('back.product_add');
    }
}
