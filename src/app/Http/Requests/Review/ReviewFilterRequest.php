<?php

namespace App\Http\Requests\Review;

use App\DTO\Review\ReviewFilterDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class ReviewFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => ['required', 'array'],
            'page.limit' => ['required', 'integer', 'min:1', 'max:24'],
            'page.number' => ['required', 'integer', 'min:1', 'max:99999999999'],
            'filter' => ['required', 'array'],
            'filter.product_id' => ['required', 'integer', 'min:0', Rule::exists('products', 'id')],
        ];
    }

    public function toDto(): ReviewFilterDTO
    {
        $data = $this->validated();

        return new ReviewFilterDTO(
            (int)$data['page']['limit'],
            (int)$data['page']['number'],
            (int)$data['filter']['product_id'],
        );
    }
}
