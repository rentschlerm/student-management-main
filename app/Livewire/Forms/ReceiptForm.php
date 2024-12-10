<?php

namespace App\Livewire\Forms;

use Livewire\Component;
// use Livewire\WithValidation;

class ReceiptForm extends Component
{
    // use WithValidation;

    public $receipt_number;
    public $payer_name;
    public $amount;
    public $purpose;
    public $date;

    // Validation rules for the form
    protected function rules()
    {
        return [
            'receipt_number' => 'required|string|max:255|unique:receipts,receipt_number',
            'payer_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'purpose' => 'required|string|max:255',
            'date' => 'required|date',
        ];
    }

    // Custom validation messages if needed
    protected $messages = [
        'receipt_number.required' => 'The receipt number is required.',
        'payer_name.required' => 'The payer name is required.',
        'amount.required' => 'The amount is required.',
        'purpose.required' => 'The purpose is required.',
        'date.required' => 'The date is required.',
    ];

    // Method to get the form data as an array
    public function all()
    {
        return [
            'receipt_number' => $this->receipt_number,
            'payer_name' => $this->payer_name,
            'amount' => $this->amount,
            'purpose' => $this->purpose,
            'date' => $this->date,
        ];
    }

    // Render the form component
    public function render()
    {
        return view('livewire.forms.receipt-form');
    }
}
