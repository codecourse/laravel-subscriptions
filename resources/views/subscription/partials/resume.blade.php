<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Resume
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Resume your subscription
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <form action="{{ route('subscription.resume') }}" method="post">
            @csrf

            <x-primary-button>
                Resume subscription
            </x-primary-button>
        </form>
    </div>
</section>
