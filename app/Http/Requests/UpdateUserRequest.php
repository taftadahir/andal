<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [ 'required' ,'string', 'email', 'max:255','unique:users,email,'.$this->route('user')->id],
            'role' => ['required', 'string', 'max:255', Rule::in(['admin', 'subscriber']),],
        ];
    }
}
