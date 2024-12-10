<?php

namespace App\Livewire\Students;

use App\Livewire\Forms\ReceiptForm;
use App\Models\Receipt;
use Livewire\Component;

class Create extends Component
{
    public ReceiptForm $form;

    public function render()
    {
        return view('livewire.students.create');
    }

    public function store()
    {
        $this->validate();

        // Store the receipt record
        Receipt::create($this->form->all());

        // Flash success message
        flash()->success('Receipt added successfully');

        // Redirect to the receipts index page after successful store
        return redirect()->route('receipts.index');
    }
}
