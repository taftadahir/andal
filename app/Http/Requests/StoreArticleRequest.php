<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Str;

class StoreArticleRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    protected function prepareForValidation(): void
    {
        if ($this->input('status') == '' || $this->input('status') == null || ( $this->input('status') != Article::STATUS_DRAFT &&  $this->input('status') != Article::STATUS_PUBLISHED &&  $this->input('status') != Article::STATUS_ARCHIVED )) {
            $this->merge([
                'status' => Article::STATUS_DRAFT,
            ]);
        }
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'banner' => ['nullable', 'integer', 'exists:assets,id'],
            
            'title' => ['bail', 'string', 'required', 'max:255'],
            'slug' => ['bail', 'string', 'required', 'unique:articles,slug', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],

            'content' => ['string', 'nullable'],
            'excerpt' => ['string', 'nullable'],
            'read_time' => ['integer', 'nullable'],
        ];
    }
}
