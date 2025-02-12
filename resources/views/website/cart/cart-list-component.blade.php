<section class="my-5">
    <div class="container">
        <div class="row py-4 table_head">
            <div class="col-5">
                <p>Item</p>
            </div>
            <div class="col-2">
                <p>Quantity</p>
            </div>
            <div class="col-2">
                <p>Price</p>
            </div>
            <div class="col-3">
                <p>Total Price</p>
            </div>
        </div>
        @forelse ($books as $book)
            @livewire('website.cart.item-component', ['book' => $book, 'quantity' => $cart[$book->id]], key($book->id))

        @empty
            <h2>No items in cart</h2>
        @endforelse

    </div>
</section>
