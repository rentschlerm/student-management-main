<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Receipt;

class Receipts extends Component
{
    public $receiptNumber;
    public $payerName;
    public $amount;
    public $purpose;
    public $date;

    public $receipts = [];

    public function mount()
    {
        // Load existing receipts from the database
        $this->receipts = Receipt::all();
    }

    public function save()
{
    // Validate input fields
    $this->validate([
        'receiptNumber' => 'required|string|max:255',
        'payerName' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'purpose' => 'required|string|max:255',
        'date' => 'required|date',
    ]);

    // Save receipt to the database
    try {
        $receipt = Receipt::create([
            'receipt_number' => $this->receiptNumber,
            'payer_name' => $this->payerName,
            'amount' => $this->amount,
            'purpose' => $this->purpose,
            'date' => $this->date,
        ]);

        // Add to receipts list and reset fields
        $this->receipts[] = $receipt;
        $this->resetFields();

        session()->flash('message', 'Receipt saved successfully!');
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error("Error saving receipt: " . $e->getMessage());
        session()->flash('error', 'Failed to save the receipt. Please try again.');
    }
}


    public function resetFields()
    {
        $this->receiptNumber = '';
        $this->payerName = '';
        $this->amount = '';
        $this->purpose = '';
        $this->date = '';
    }

    public function render()
{
    $receipts = Receipt::paginate(10); // Adjust the query as needed
    return view('livewire.students.index', compact('receipts'));
}
}
