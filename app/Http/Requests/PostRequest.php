<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
        $post = Post::find($this->posts);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'category_id' => 'required',
                    'slug'  => 'required',
                    'title' => 'required',
                    'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    'excerpt' => 'required',
                    'body' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'category_id' => 'nullable',
                    'slug'  => 'nullable|unique:posts,slug,'.$this->post->id,
                    'title' => 'nullable',
                    'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
//                    'slug'  => ['required', Rule::unique('posts')->ignore($this->id)],
                    'excerpt' => 'nullable',
                    'body' => 'nullable',
                ];
            }
            default:break;
        }

    }
}
