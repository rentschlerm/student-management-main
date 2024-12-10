<div>
    <!-- Form Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <form wire:submit.prevent="save">
            <div>
                <label>Receipt Number</label>
                <input type="text" wire:model="receiptNumber" class="border rounded w-full">
            </div>
            <div>
                <label>Payer Name</label>
                <input type="text" wire:model="payerName" class="border rounded w-full">
            </div>
            <div>
                <label>Amount</label>
                <input type="number" wire:model="amount" class="border rounded w-full">
            </div>
            <div>
                <label>Purpose</label>
                <input type="text" wire:model="purpose" class="border rounded w-full">
            </div>
            <div>
                <label>Date</label>
                <input type="date" wire:model="date" class="border rounded w-full">
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                <button type="button" wire:click="resetFields" class="bg-gray-500 text-white px-4 py-2 rounded">Clear</button>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <table class="table-auto w-full mt-6">
        <thead>
            <tr>
                <th>Receipt Number</th>
                <th>Payer Name</th>
                <th>Amount</th>
                <th>Purpose</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($receipts) && count($receipts) > 0)
                @foreach($receipts as $receipt)
                    <tr>
                        <td>{{ $receipt->receipt_number }}</td>
                        <td>{{ $receipt->payer_name }}</td>
                        <td>{{ $receipt->amount }}</td>
                        <td>{{ $receipt->purpose }}</td>
                        <td>{{ $receipt->date }}</td>
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
