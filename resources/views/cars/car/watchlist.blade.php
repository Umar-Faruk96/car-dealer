<x-app-layout pageTitle="My Favourite Cars">
    <main>
        <!-- New Cars -->
        <section>
            <div class="container">
                <div class="flex items-center justify-between">
                    <h2>My Favourite Cars</h2>

                    @if($favouriteCars->total() > 0)
                        <div class="pagination-summary">
                            <p>Showing <strong>{{ $favouriteCars->firstItem() }}</strong> to
                                <strong>{{ $favouriteCars->lastItem() }}</strong> of
                                <strong>{{ $favouriteCars->total() }}</strong> {{ Str::plural('result', $favouriteCars->total()) }}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="car-items-listing">
                    @forelse($favouriteCars as $favouriteCar)
                        <x-car-item :car='$favouriteCar' :watchlist="true" />
                    @empty
                        <p class="text-center">You don't have any favourite cars yet.</p>
                    @endforelse
                </div>

                {{ $favouriteCars->onEachSide(1)->links() }}
            </div>
        </section>
        <!--/ New Cars -->
    </main>
</x-app-layout>