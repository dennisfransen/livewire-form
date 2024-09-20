<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use Illuminate\View\View;
use Livewire\Component;

class Form extends Component
{
	public ?Invoice $invoice = null;

	public function isNew(): bool
	{
		return $this->invoice->id === null;
	}

	public function mount(?Invoice $invoice = null): void
	{
		$this->invoice = $invoice;
	}

    public function render(): View
    {
        return view('livewire.invoices.form');
    }
}
