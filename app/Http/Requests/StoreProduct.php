<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
 

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|max:200',
            'quantity' => 'required|min:1',
            'type' => ['required',
                Rule::exists('product_types', 'id')->where(function (Builder $query) {
                    return $query->where('status', 1);
                }),
            ],
            'price_raw' => 'required|digits_between:1,10|gt:1000',
            'weight' => 'required|digits_between:1,10|min:1',
            'warranty' => 'required|digits_between:1,10|min:0',
            'dimensions' => 'max:200',
            // 'productImages' => 'image'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Tối đa 200 ký tự',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.min' => 'Cần tối thiểu 1 sản phẩm',
            'type.*' => 'Vui lòng chọn loại sản phẩm',
            'price_raw.required' => 'Vui lòng nhập giá',
            'price_raw.digits' => 'Giá không đúng định dạng',
            'price_raw.gt' => 'Giá tối thiểu 1000 đồng',
            'weight.required' => 'Vui lòng nhập trọng lượng của sản phẩm',
            'weight.digits' => 'Nhập sai định dạng',
            'weight.min' => 'Nhập sai định dạng',
            'warranty.required' => 'Vui lòng nhập thời hạn bảo hành',
            'warranty.digits' => 'Nhập sai định dạng',
            'warranty.min' => 'Nhập sai định dạng',
            'dimensions.max' => 'Tối đa 200 kí tự',
            'productImages.image' => 'Sai định dạng',
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array {
        return [
            function (Validator $validator) {
                $images = request()->productImages;
                if (empty($images)) {
                    $validator->errors()->add(
                        'productImages',
                        'Phải có ít nhất một bức hình của sản phẩm'
                    );

                    return;
                }

                if (count($images) > 5) {
                    $validator->errors()->add(
                        'productImages',
                        'Tối đa năm bức hình'
                    );
                }
            }
        ];
    }
}
