<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;  // Change to true to allow request to be authorized
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'phone' => ['nullable', 'string', 'regex:/^(0[6892]{1})\d{8}$/', 'max:10'],
            'fax' => 'nullable|string|max:20',
            'house_no' => 'required|string|max:255',
            'village_no' => 'nullable|string|max:255',
            'road' => 'nullable|string|max:255',
            'province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'sub_district' => 'required|string|max:100',
            'postal_code' => 'required|string|max:5|regex:/^[0-9]{5}$/', 
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'company_name.required' => 'กรุณากรอกชื่อหน่วยงาน',
            'company_name.string' => 'ชื่อหน่วยงานต้องเป็นข้อความ',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.string' => 'เบอร์โทรศัพท์ต้องเป็นข้อความ',
            'fax.string' => 'โทรสารต้องเป็นข้อความ',
            'house_no.required' => 'กรุณากรอกเลขที่',
            'province.required' => 'กรุณาเลือกจังหวัด',
            'district.required' => 'กรุณาเลือกเขต/อำเภอ',
            'sub_district.required' => 'กรุณาเลือกตำบล/แขวง',
            'postal_code.required' => 'กรุณากรอกรหัสไปรษณีย์',
            'postal_code.regex' => 'รหัสไปรษณีย์ต้องเป็นตัวเลข 5 หลัก',
        ];
    }
}
