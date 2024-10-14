<?php

namespace App\Http;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'from_card' => ['required', 'digits:16', 'starts_with:627381,502229,505785,502806,622106,502908,639194', 'exists:cards,card_number'],
            'to_card' => ['required', 'digits:16', 'starts_with:627381,502229,505785,502806,622106,502908,639194', 'exists:cards,card_number'],
            'amount' => ['required', 'numeric', 'min:1000', 'max:50000000'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'from_card' => $this->convertToEnglishNumbers($this->input('from_card')),
            'to_card' => $this->convertToEnglishNumbers($this->input('to_card')),
        ]);
    }

    private function convertToEnglishNumbers($number): string
    {
        return strtr($number, ['۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9']);
    }
}
