<?php

namespace Untrefmedia\UMUsers\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            // crear
            case 'POST':
                return [
                    'name'     => 'required',
                    'email'    => 'required|email|unique:users,email',
                    'password' => 'required'

                ];
                break;

            // editar
            case 'PATCH':
                return [
                    'name'  => 'required',
                    'email' => 'required|email|unique:users,email,' . $this->all()['id']
                ];
                break;

            default:
                # code...
                break;
        }

    }

}
