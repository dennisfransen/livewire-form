<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('Invoices') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
				<table class="w-full text-sm">
					<colgroup>
						<col class="w-4/6">
						<col class="w-1/6">
						<col class="w-1/6">
					</colgroup>
					<thead>
						<tr class="dark:text-white">
							<th class="px-3 text-left">{{ __('Description') }}</th>
							<th class="px-3 text-left">{{ __('Invoice date') }}</th>
							<th class="px-3 text-right">{{ __('Actions') }}</th>
						</tr>
					</thead>
					<tbody class="divide-y dark:divide-gray-700">
						@foreach($invoices as $invoice)
							<tr class="dark:text-gray-400 dark:hover:bg-gray-700 transition-colors">
								<td class="truncate max-w-0 px-4 py-3">
									{{ $invoice->description }}
								</td>
								<td class="truncate max-w-0 px-4 py-3">
									{{ $invoice->invoice_date }}
								</td>
								<td class="text-right px-4 py-3">
									<a href="{{ route('invoices.edit', $invoice) }}" class="mr-4">
										{{ __('Edit') }}
									</a>
									<a href="{{ route('invoices.show', $invoice) }}">
										{{ __('Show') }}
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="px-3 pt-6">
					{{ $invoices->links() }}
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
