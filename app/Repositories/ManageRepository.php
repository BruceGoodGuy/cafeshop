<?php
namespace App\Repositories;
use App\Interfaces\ManageInterface;
use App\Models\UserSocial;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\ProductTypes;
use Log;
use App\Common\Constant;
use App\Models\Products;
use App\Models\ProductDetail;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Throwable;

class ManageRepository implements ManageInterface {
    public function retrieveUserInfo() {
        $userID = auth()->user()->id;
        $fullUser = User::join('user_details', 'users.id', '=', 'user_details.user_id', 'left')
            ->select(['bio', 'full', 'username', 'phonenumber', 'location', 'avatar_path', 'email', 'role', 'name'])
            ->leftJoin('user_avatar', function($join) {
                $join->on('user_details.user_id', '=', 'user_avatar.user_id')
                    ->where('active', '=', true);
            })
            ->where('users.id', '=', auth()->user()->id)->first()->toArray();
        
        
        $userSocials = UserSocial::where('user_id', $userID)->select('type', 'path')->get()->toArray();
        $fullUser['socials'] = $userSocials;

        return $fullUser;
    }

    public function updateProfile($data) {
        try {     
            $user = User::where('email', $data['email'])->firstOrFail();
            $userDetail = UserDetail::where('user_id', $user->id)->first();
            
            $isUpdate = false;
         
            if ($user['name'] !== $data['name']) {
                $isUpdate = true;
                $user->name = $data['name'];
            }

            if (!is_null($data['password'])) {
                $password = bcrypt($data['password']);
                $user->password = $password;
                $isUpdate = true;
            }

            if ($isUpdate) {
                $user->update();
                $isUpdate = false;
            }

            if ($userDetail === null) {
                UserDetail::create([
                    'user_id' => $user->id,
                    'full' => $data['full'],
                    'username' => $data['username'],
                    'phonenumber' => $data['phonenumber'],
                    'location' => $data['location'],
                ]);
            } else {
                if ($userDetail['full'] !== $data['full']) {
                    $isUpdate = true;
                    $userDetail->full = $data['full'];
                }

                if ($userDetail['username'] !== $data['username']) {
                    $isUpdate = true;
                    $userDetail->username = $data['username'];
                }
                
                if ($userDetail['phonenumber'] !== $data['phonenumber']) {
                    $isUpdate = true;
                    $userDetail->phonenumber = $data['phonenumber'];
                }
                
                if ($userDetail['location'] !== $data['location']) {
                    $isUpdate = true;
                    $userDetail->location = $data['location'];
                }
    
                if ($isUpdate) {
                    $userDetail->update();
                }
            }

            return Constant::USER_UPDATED;

        } catch (ModelNotFoundException $e) {
            Log::debug('_____ Không tìm thấy người dùng có email_____' . $data['email']);
            Log::debug($e);
            Log::debug('Error: ' .$e->getMessage());
            return Constant::NOT_FOUND_USER;
        } catch (\Throwable $e) {
            Log::debug('_____ Lỗi cập nhật hồ sơ người dùng_____');
            Log::debug($e);
            Log::debug('Error: ' .$e->getMessage());
            return Constant::UNEXPECTED_ERROR;
        }
    }

    public function addCategory($data) {
        $data['status'] = isset($data['status']);
        ProductTypes::create($data);
    }

    public function getCategories($conditions = [], $selects = []) {
        $producttype = ProductTypes::orderBy('created_at', 'desc');

        if ($selects) {
            $producttype->select($selects);
        }

        if ($conditions) {
            $producttype->where($conditions);
        }

        return $producttype->get();
    }

    public function getCategory($id) {
        try {
            return ProductTypes::where(['id' => $id])->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return Constant::NOT_FOUND_ITEM;
        }
    }

    public function updateCategory($data) {
        try {
            $data['status'] = isset($data['status']);
            $category = ProductTypes::where(['id' => $data['id']])->firstOrFail();
            $isupdate = false;
            if ($data['name'] !== $category->name) {
                $category->name = $data['name'];
                $isupdate = true;
            }
            if ($data['status'] !== $category->status) {
                $category->status = $data['status'];
                $isupdate = true;
            }

            if ($isupdate) {
                $category->update();
            }

            return Constant::ITEM_UPDATED;
            
        } catch (ModelNotFoundException $e) {
            return Constant::NOT_FOUND_ITEM;
        }
    }

    public function deleteCategory($id) {
        try {    
            $category = ProductTypes::where(['id' => $id])->firstOrFail();
            $category->delete();
            return Constant::ITEM_DELETED;
        } catch (ModelNotFoundException $e) {
            return Constant::NOT_FOUND_ITEM;
        }
    }

    public function saveProduct($data) {

        try {
            DB::transaction(function () use ($data) {
                $productdata = [
                    'name' => $data['name'],
                    'type' => $data['type'],
                    'weight' => $data['weight'],
                    'price' => $data['price_raw'],
                    'status' => isset($data['status']),
                    'image' => '',
                ];
        
                $image = array_shift($data['productImages']);
        
                $path = 'images/avatar/avatar_' . $data['name'] . '_' . date('YmdHis') . '.' . $image->extension();
                $productdata['image'] = $path;
                Storage::disk('local')->put($path, file_get_contents($image));
                $product = Products::create($productdata);
        
                $productdetail = [
                    'product_id' => $product->id,
                    'summary' => $data['summary'] ?? '',
                    'detail' => $data['detail'] ?? '',
                    'quantity' => $data['quantity'],
                    'dimensions' => $data['dimensions'] ?? '',
                    'size' => $data['size'] ?? 'empty',
                    'warranty' => $data['warranty'] ?? '',
                ];
    
                ProductDetail::create($productdetail);
    
                foreach ($data['productImages'] as $key => $image1) {
                    $path = 'images/avatar/avatar_' . $data['name'] . '_' . date('YmdHis') . '_' . $key + 1 . '.' . $image1->extension();
                    Storage::disk('local')->put($path, file_get_contents($image1));
                    ProductImages::create([
                        'product_id' => $product->id,
                        'path' => $path,
                    ]);
                }
            });

            return Constant::ITEM_CREATED;
        } catch(Throwable $e) {
            Log::debug('_____ Lỗi thêm mới sản phẩm_____');
            Log::debug($e);
            Log::debug('Error: ' .$e->getMessage());
            return Constant::UNEXPECTED_ERROR;
        }
    }
}