<?php

namespace App\Http\Controllers;

use App\Common\Constant;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryAddRequest;
use App\Interfaces\ManageInterface;

class CategoryController extends Controller
{
    private $manageInterface;
    public function __construct(ManageInterface $manageInterface) {
        $this->manageInterface = $manageInterface;
    }

    public function index() {
        $categories = $this->manageInterface->getCategories();
        return view('back.category_list')->with(['categories' => $categories]);
    }
    //
    public function add() {
        return view('back.category_add');
    }

    public function store(CategoryAddRequest $request) {
        $data = $request->only(['name', 'status']);
        $this->manageInterface->addCategory($data);
        return redirect()->route('category.list')->with('success', "Loại sản phẩm '{$data['name']}' được tạo thành công.");
    }

    public function edit($id) {
        $category = $this->manageInterface->getCategory($id);
        if ($category === Constant::NOT_FOUND_ITEM) {
            return redirect()->route('category.list')->with('error', __(Constant::NOT_FOUND_ITEM));
        }

        return view('back.category_edit', ['category' => $category]);
    }

    public function update($id, CategoryAddRequest $request) {
        $category = $this->manageInterface->updateCategory([...$request->only(['name', 'status']), 'id' => $id]);
        if ($category === Constant::ITEM_UPDATED) {
            return redirect()->route('category.list')->with('success', __(Constant::ITEM_UPDATED));
        }

        return redirect()->back()->with('error', __($category));
    }

    public function delete($id) {
        $category = $this->manageInterface->deleteCategory($id);
        if ($category === Constant::ITEM_DELETED) {
            return redirect()->route('category.list')->with('success', __(Constant::ITEM_DELETED));
        }

        return redirect()->back()->with('error', __($category));
    }
}
