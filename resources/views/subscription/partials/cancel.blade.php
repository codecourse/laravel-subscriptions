<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Cancel
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Cancel your subscription
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <form action="{{ route('subscription.cancel') }}" method="post">
            @csrf

            <x-danger-button>
                Cancel subscription
            </x-danger-button>
        </form>
    </div>
</section>
