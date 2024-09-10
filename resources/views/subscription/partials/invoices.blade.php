<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Invoices
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            These are your invoices
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <ul>
            @foreach($invoices as $invoice)
                <li>
                    <strong>{{ $invoice->date()->toDateString() }}</strong>. {{ $invoice->total() }}. <a href="{{ route('subscription.invoice', ['invoice' => $invoice->id]) }}" class="text-indigo-500">Download</a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
