    @if ($book_count) 
    <a href="{{ route('front.cart.index') }}" class="cart-link">
        <span>{{ $book_count }}</span>
        <i class="fa-solid fa-cart-shopping fs-3"></i></a>
    @else
          <a href="{{ route('front.cart.index') }}" class="cart-link">
        <i class="fa-solid fa-cart-shopping fs-3"></i></a>  
    @endif
