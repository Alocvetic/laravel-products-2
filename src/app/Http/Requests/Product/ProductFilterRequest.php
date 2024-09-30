<?php

namespace App\Http\Requests\Product;

use App\DTO\Product\ProductFilterDTO;
use Illuminate\Foundation\Http\FormRequest;

final class ProductFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => ['required', 'array'],
            'page.limit' => ['required', 'integer', 'min:1', 'max:200'],
            'page.number' => ['required', 'integer', 'min:1', 'max:99999999999'],
            'sort' => ['nullable', 'string', 'in:price,-price,title,-title,category,-category'],
            'filter' => ['nullable', 'array'],
            'filter.category' => ['nullable', 'string', 'min:2', 'max:255'],
            'filter.price_from' => ['nullable', 'integer', 'min:0'],
            'filter.price_to' => ['nullable', 'integer', 'min:0'],
            'filter.search' => ['nullable', 'string', 'min:1'],
        ];
    }

    public function toDto(): ProductFilterDTO
    {
        $data = $this->validated();

        return new ProductFilterDTO(
            (int)$data['page']['limit'],
            (int)$data['page']['number'],
            $data['sort'] ?? null,
            $data['filter']['category'] ?? null,
            isset($data['filter']['price_from']) ? (float)$data['filter']['price_from'] : null,
            isset($data['filter']['price_to']) ? (float)$data['filter']['price_to'] : null,
            $data['filter']['search'] ?? null,
        );
    }
}
