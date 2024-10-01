<?php

declare(strict_types=1);

namespace App\Http\Requests\Review;

use App\DTO\Review\CreateReviewDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class CreateReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'author' => ['required', 'string', 'min:2', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'product_id' => ['required', 'integer', 'min:0', Rule::exists('products', 'id')],
            'text' => ['required', 'string', 'min:2', 'max:800'],
        ];
    }

    public function toDto(): CreateReviewDTO
    {
        $data = $this->validated();

        return new CreateReviewDTO(
            $data['author'],
            (int)$data['rating'],
            (int)$data['product_id'],
            $data['text'],
        );
    }
}
