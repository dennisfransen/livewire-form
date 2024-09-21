<?php

namespace App\Livewire\Forms;

use App\Models\Invoice;
use Livewire\Attributes\Validate;
use Livewire\Form;

class InvoiceForm extends Form
{
	public ?Invoice $invoice;

	#[Validate('required')]
	public $description = '';

	#[Validate('required|date_format:Y-m-d')]
	public $invoice_date = '';

	public function setInvoice(Invoice $invoice): void
	{
		$this->invoice = $invoice;
		$this->description = $invoice->description;
		$this->invoice_date = $invoice->invoice_date;
	}
}
