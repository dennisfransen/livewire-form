<div class="p-4 dark:text-white">
	<form
		id="store"
		method="POST"
		action="{{ $this->isNew() === true ? route('invoices.store') : route('invoices.update', $form->invoice) }}"
	>
		@csrf
		@if($this->isNew() === false)
			@method('PUT')
		@endif
		<div>
			<label for="description" class="font-semibold">{{ __('Description') }}</label>
			<textarea
				id="description"
				name="description"
				rows="10"
				class="dark:bg-gray-800 w-full mt-2"
				wire:model="form.description"
			></textarea>
		</div>

		@error('description')
		{{ $message }}
		@enderror

		<div class="mt-4">
			<label for="invoice_date" class="font-semibold">{{ __('Invoice date') }}</label>
			<input
				type="date"
				id="invoice_date"
				name="invoice_date"
				class="dark:bg-gray-800 w-full mt-2"
				wire:model="form.invoice_date"
			/>
		</div>

		@error('invoice_date')
		{{ $message }}
		@enderror
	</form>

	@if($this->isNew() === false)
		<form id="destroy" method="post" action="{{  route('invoices.destroy', $form->invoice) }}">
			@csrf
			@method('DELETE')
		</form>
	@endif

	<div class="mt-10">
		<button type="submit" form="destroy" class="py-2 px-4 bg-red-500 rounded hover:bg-red-600 transition-colors">
			{{ __('Delete') }}
		</button>
		<button type="submit" form="store" class="py-2 px-4 bg-indigo-500 rounded hover:bg-indigo-600 transition-colors">
			{{ __('Submit') }}
		</button>
	</div>
</div>
