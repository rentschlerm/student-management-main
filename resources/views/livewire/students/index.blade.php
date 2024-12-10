<div class="py-4">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="flex justify-between p-4 item-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-neutral-200">Receipts</h1>
                <p class="text-sm text-gray-500 dark:text-neutral-400">List of all receipts</p>
            </div>
            <div>
                <a href="{{ route('students.create') }}" wire:navigate class="inline-flex items-center px-4 py-3 mb-4 text-sm font-medium text-white bg-indigo-500 border border-transparent rounded-lg shadow-md gap-x-2 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600 disabled:opacity-50 disabled:pointer-events-none">
                    Add Receipt
                </a>
            </div>
        </div>

        {{-- Search receipts --}}
        <div>
            <x-search placeholder="Search receipts.." wire:model.live.debounce.500="search" />
        </div>
        {{-- end search --}}

        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700" id="paginated-receipts">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start {{ $sortColumn == 'id' ? 'border-b-2 border-indigo-300' : '' }}">
                                                <x-sortable column="id" :$sortColumn :$sortDirection>
                                                    ID
                                                </x-sortable>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start {{ $sortColumn == 'receipt_number' ? 'border-b-2 border-indigo-300' : '' }}">
                                                <x-sortable column="receipt_number" :$sortColumn :$sortDirection>
                                                    Receipt Number
                                                </x-sortable>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start {{ $sortColumn == 'payer_name' ? 'border-b-2 border-indigo-300' : '' }}">
                                                <x-sortable column="payer_name" :$sortColumn :$sortDirection>
                                                    Payer Name
                                                </x-sortable>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start {{ $sortColumn == 'amount' ? 'border-b-2 border-indigo-300' : '' }}">
                                                <x-sortable column="amount" :$sortColumn :$sortDirection>
                                                    Amount
                                                </x-sortable>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start {{ $sortColumn == 'purpose' ? 'border-b-2 border-indigo-300' : '' }}">
                                                <x-sortable column="purpose" :$sortColumn :$sortDirection>
                                                    Purpose
                                                </x-sortable>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start {{ $sortColumn == 'date' ? 'border-b-2 border-indigo-300' : '' }}">
                                                <x-sortable column="date" :$sortColumn :$sortDirection>
                                                    Date
                                                </x-sortable>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($receipts) && count($receipts) > 0)
                                        @foreach($receipts as $receipt)
                                            <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-neutral-800 dark:even:bg-neutral-700 dark:hover:bg-neutral-700">
                                                <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $receipt->id }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $receipt->receipt_number }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $receipt->payer_name }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $receipt->amount }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $receipt->purpose }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $receipt->date }}</td>
                                                <td class="flex justify-end px-6 py-4 text-sm font-medium whitespace-nowrap gap-x-3">
                                                    <a href="{{ route('receipts.edit', $receipt->id) }}" wire:navigate class="text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Edit</a>

                                                    <button 
                                                    type="button" 
                                                    wire:click="delete({{ $receipt->id }})"
                                                    wire:confirm="Are you sure you want to delete this receipt?" 
                                                    class="text-sm font-semibold text-red-600 border border-transparent rounded-lg gap-x-2 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">No receipts available.</td>
                                                </tr>
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>

        {{-- Spinner --}}
        {{-- <x-spinner wire:loading /> --}}
        {{-- End Spinner --}}
    </div>
</div>
