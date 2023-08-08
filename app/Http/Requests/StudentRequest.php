<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
            $rules = [];

            $method = $this->route()->getActionMethod();

            switch ($this->method()) {
                case 'POST':
                  switch ($method) {
                    case 'add':
                        $rules = [
                            'name' => 'required', 
                            'phone' => 'required|unique:students',
                            'address' => 'required',
                            'image' => 'required'
                        ];
                        break;
                        case 'edit':
                            $rules = [
                                'name' => 'required',
                                'phone' => 'required',
                                'address' => 'required',
                            ];
                            break;
                    default:
                        break;
                  }
                    break;
                default:
                    break;
            }

            return $rules;
    }

    public function message(){
      return[
        'name.required'=> 'Không được bỏ trống tên',
        'phone.required'=>'Không được bỏ trống số điện thoại',
        'phone.unique'=>'Số điện thoại này đã được dùng',
        'address.required'=>'Không được bỏ trống địa chỉ',
        'image.required' => 'Không được bỏ trống ảnh'
      ];
    }
}
