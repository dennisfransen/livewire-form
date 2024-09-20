<div class="p-4 dark:text-white">
	<form
		id="store"
		method="post"
		action="{{ $this->isNew() === true ? route('invoices.store') : route('invoices.update', $invoice) }}"
	>
		@csrf
		@if($this->isNew() === false)
			@method('PUT')
		@endif
		<div>
			<label for="description" class="font-semibold">
				{{ __('Description') }}
			</label>
			<textarea name="description" id="description" rows="10" class="dark:bg-gray-800 w-full mt-2"
			>{{ old('description', $invoice?->description) }}</textarea>
		</div>

		@error('description')
		{{ $message }}
		@enderror
	</form>

	@if($this->isNew() === false)
		<form id="destroy" method="post" action="{{  route('invoices.destroy', $invoice) }}">
			@csrf
			@method('DELETE')
		</form>
	@endif

	<div class="mt-2">
		<button type="submit" form="destroy" class="py-2 px-4 bg-red-500 rounded hover:bg-red-600 transition-colors">
			{{ __('Delete') }}
		</button>
		<button type="submit" form="store" class="py-2 px-4 bg-indigo-500 rounded hover:bg-indigo-600 transition-colors">
			{{ __('Submit') }}
		</button>
	</div>
</div>
