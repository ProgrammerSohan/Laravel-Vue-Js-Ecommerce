<x-app-layout>

    <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <h1 class="text-3xl font-bold mb-6">Your Cart Items</h1>

        <div
          x-data="{
            cartItems: {{
                json_encode(
                    $products->map(fn($product) => [
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                        'quantity' => $cartItems[$product->id]['quantity'],
                        'href' => route('product.view', $product->slug)
                    ])
                )
            }},
            get cartTotal() {
                return this.cartItems.reduce((accum, next) => accum + next.price * next.quantity, 0).toFixed(2)
            },
        }"
          class="bg-white p-4 rounded-lg shadow">
           <template x-if="cartItems.length">


          <!-- Product Items -->
          <div>
            <!-- Product Item -->
            <template x-for="product of cartItems" :key="product.id">
              <div>
                <div
                  x-data="productItem(product)"
                  class="w-full flex flex-col sm:flex-row items-center gap-4"
                >
                  <a href="/src/product.html" class="w-36 h-32 flex items-center justify-center overflow-hidden">
                    <img :src="product.image" class="object-cover" alt="" />
                  </a>
                  <div class="flex-1 flex flex-col justify-between">
                    <div class="flex justify-between mb-3">
                      <h3 x-text="product.title"></h3>
                      <span class="text-lg font-semibold">
                        $<span x-text="product.price"></span>
                      </span>
                    </div>
                    <div class="flex justify-between items-center">
                      <div class="flex items-center">
                        Qty:
                        <input
                          type="number"
                          min="1"
                          x-model="product.quantity"
                          @change="updateQuantity()"
                          class="ml-3 py-1 border-gray-200 focus:border-purple-600 focus:ring-purple-600 w-16"
                        />
                      </div>
                      <a

                        @click.prevent="remove()"
                        href="#"
                        class="text-purple-600 hover:text-purple-500"
                        >Remove</a
                      >
                    </div>
                  </div>
                </div>
                <!--/ Product Item -->
                <hr class="my-5" />
              </div>
            </template>
            <!-- Product Item -->
          </div>
          <!--/ Product Items -->

          <div class="border-t border-gray-300 pt-4">
            <div class="flex justify-between">
              <span class="font-semibold">Subtotal</span>
              <span class="text-xl" x-text="`$${total}`"></span>
            </div>
            <p class="text-gray-500 mb-6">
              Shipping and taxes calculated at checkout.
            </p>

            <button type="submit" class="btn-primary w-full py-3 text-lg">
              Proceed to Checkout
            </button>
             </template>
             <template x-if="!cartItems.length">
                <div class="text-center py-8 text-gray-500">
                    You don't have any items!

                </div>

            </template>

          </div>
        </div>
      </div>

</x-app-layout>
