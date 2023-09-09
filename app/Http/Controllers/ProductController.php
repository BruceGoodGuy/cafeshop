<?php

namespace App\Http\Controllers;

use App\Common\Constant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{
    //

    private $manageInterface;
    public function __construct(\App\Interfaces\ManageInterface $manageInterface) {
        $this->manageInterface = $manageInterface;
    }

    public function add() {
        $categories = $this->manageInterface->getCategories(['status' => 1], ['id', 'name']);
        return view('back.product_add', ['categories' => $categories]);
    }

    public function store(StoreProduct $request) {
        $data = $request->only(['name', 'quantity', 'type', 'price_raw', 'weight', 'warranty',
            'dimensions', 'summary', 'detail', 'productImages', 'status']);
        $status = $this->manageInterface->saveProduct($data);
        if ($status === Constant::ITEM_CREATED) {
            return redirect()->route('product.list')->with('success', __($status));
        }

        return redirect()->back()->withInput()->with(['error' => __($status)]);
    }

    public function index() {
        return view('back.product_list');
    }
}
