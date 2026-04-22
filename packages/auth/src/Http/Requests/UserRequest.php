<?php

namespace AI\Auth\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403, Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($this->user->id ?? null),
            ],
            'password' => 'nullable|min:6|max:255|confirmed',
            'roles.*' => 'required',
            'roles' => 'required|array',
        ];
    }

    /**
     * Get form data
     */
    public function getData(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'roles' => $this->roles,
        ];
    }
}
