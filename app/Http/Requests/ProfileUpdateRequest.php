<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'whatsapp_number' => ['required', 'string', 'max:20'],
            'academic_level' => ['required', 'in:advanced_level,hnd,degree,other'],
            'interests' => ['nullable', 'string', 'max:1000'],
            'phone' => ['nullable', 'string', 'max:20'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ];

        // Add mentor-specific validation rules
        if ($this->user() && $this->user()->isMentor()) {
            $rules['expertise'] = ['nullable', 'string', 'max:1000'];
            $rules['experience_years'] = ['nullable', 'integer', 'min:0', 'max:50'];
            $rules['hourly_rate'] = ['nullable', 'numeric', 'min:0', 'max:1000000'];
        }

        return $rules;
    }
}
