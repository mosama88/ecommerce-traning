<div class="col-12">
    <div class="item-cart row">
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="item-image">
                @if ($book->getFirstMediaUrl('image', 'preview'))
                    <img src="{{ $book->getFirstMediaUrl('image', 'preview') }}" alt="" class="w-100 h-100" />
                @else
                    <img src="{{ asset('dashboard') }}/default_book.png" alt="Thumbnail" class="w-100 h-100">
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="item-description d-flex flex-column gap-2">
                <p class="fw-bold">{{ $book->name }}</p>
                <p class="description">
                    Author:
                    <span class="fw-bold text-dark">{{ $book->author->name }}</span>
                </p>
                <p class="description book-description">
                    {{ Str::limit($book->description, 60) }}
                </p>
                <div class="dlivery d-flex gap-3">
                    <img src="{{ asset('front') }}/images/shipping.png" alt="" width="20" height="20" />
                    <p class="description">Free Shipping Today</p>
                </div>
                <p class="description">
                    <span class="sell-code description fw-bold fs-5">ASIN :</span>B09TWSRMCB
                </p>
            </div>
        </div>

        {{-- @livewire('website.decrement-increment', ['book' => $book, 'quantity' => $quantity]) --}}

        <div class="col-lg-6 d-flex">
            <div class="col-lg-3 col-md-4 col-sm-4 d-flex align-items-center">
                <div class="d-flex gap-3 align-items-center mt-3">
                    <div class="books_count d-flex gap-3 align-items-center">
                        <span class="decrement_quantity" wire:click="decrement">-</span>
                        <p id="quantity">{{ $quantity }}</p>
                        <span class="increment_quantity" wire:click="increment">+</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 d-flex align-items-center">
                <p class="fw-bold fs-5 mt-3  mx-auto">${{ $book->price }}</p>
            </div>
            <div class="sell-price col-lg-6 col-md-4 col-sm-4 d-flex align-items-center">
                <p class="fw-bold fs-5 mt-3  mx-auto">${{ $book->price * $quantity }}</p>
            </div>
        </div>




        <div class="col-lg-1 col-md-4 col-sm-4 d-flex align-items-center">
            <form action="{{ route('front.cart.removeItem', $book->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="fs-5 mt-3 del-item">
                    <button class="border-0">
                        <i class="fa-solid fa-trash-can main_text"></i>
                        <p class="remove">Remove</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
