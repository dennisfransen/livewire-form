<?php

namespace App\Livewire\Invoices;

use App\Livewire\Forms\InvoiceForm;
use App\Models\Invoice;
use Illuminate\View\View;
use Livewire\Component;

class Form extends Component
{
	public InvoiceForm $form;

	public function isNew(): bool
	{
		return $this->form->invoice->id === null;
	}

	public function mount(?Invoice $invoice = null): void
	{
		$this->form->setInvoice($invoice);
	}

    public function render(): View
    {
        return view('livewire.invoices.form');
    }
}
