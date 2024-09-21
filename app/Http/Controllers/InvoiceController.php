<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvoiceController extends Controller
{
	public function index(): View
	{
		return view('invoices.index', [
			'invoices' => Invoice::query()->orderBy('updated_at', 'desc')->paginate(10),
		]);
	}

	public function show(Invoice $invoice): View
	{
		return view('invoices.show', [
			'invoice' => $invoice,
		]);
	}

	public function create(): View
	{
		return view('invoices.create');
	}

	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'description' => 'required',
			'invoice_date' => 'required|date_format:Y-m-d',
		]);

		$invoice = auth()->getUser()->invoices()->create($validated);

		return redirect()->route('invoices.show', $invoice);
	}

	public function edit(Invoice $invoice): View
	{
		return view('invoices.edit', [
			'invoice' => $invoice,
		]);
	}

	public function update(Request $request, Invoice $invoice): RedirectResponse
	{
		$validated = $request->validate([
			'description' => 'required',
			'invoice_date' => 'required|date_format:Y-m-d',
		]);

		$invoice->update($validated);

		return redirect()->route('invoices.show', $invoice);
	}

	public function destroy(Invoice $invoice): RedirectResponse
	{
		$invoice->delete();

		return redirect()->route('invoices.index');
	}
}
