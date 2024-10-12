<?php

namespace App\Http\Requests\MoneyComesBack;

use App\Models\MoneyComesBack;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UploadRequest extends FormRequest
{
    /**
     * Xác định người dùng có quyền gửi yêu cầu này hay không.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Đảm bảo rằng việc xác thực yêu cầu này luôn được phép
    }

    /**
     * Các quy tắc xác thực áp dụng cho yêu cầu này.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg', // Kiểm tra file là ảnh và giới hạn kích thước tối đa
        ];
    }

    /**
     * Các thông báo lỗi tùy chỉnh.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.required' => 'Hãy chọn một ảnh để upload.',
            'image.image' => 'File phải là ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ];
    }
}
