<main>
    @livewire('website.cart.cart-list-component', ['books' => $books, 'cart' => $cart]) <!-- payment -->




    @livewire('website.cart.cart-summary-component', ['shipping_areas' => $shipping_areas, 'total' => $total])
</main>
