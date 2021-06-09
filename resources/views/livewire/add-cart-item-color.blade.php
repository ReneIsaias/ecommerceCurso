<div x-data>
   
    <p class="text-lg text-gray-700">Color:</p>

    <select wire:model="color_id" class="form-control w-full">
        <option value="" selected disabled>Seleccione un color</option>
        @foreach ($colors as $color)
            <option value="{{$color->id}}">{{__($color->name)}}</option>
        @endforeach
    </select>

    <p class="text-gray-700 my-4">
        <span class="font-semibold text-lg">
            Stock disponible :
        </span>
        @if ($quantity)
            {{$quantity}}
        @else
            {{ $product->stock }}
        @endif
    </p>

    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button 
                disabled
                x-bind:disabled="$wire.qty <= 1"
                wire:loading.attr="disabled"
                wire:target="decrement"
                wire:click="decrement">
                -
            </x-jet-secondary-button>

            <span class="mx-2 text-gray-700">{{$qty}}</span>

            <x-jet-secondary-button
                x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled"
                wire:target="increment"
                wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>

        <div class="flex-1">
            <x-button
                {{-- Evento cuando precionamos sobre el boton desencade ese evento --}}
                wire:click="addItem"
                {{-- Mientras hace una accion, desabilitamoes el boton --}}
                wire:loading.attr="disabled"
                {{-- Mientras ejecuta esa funcion no se podra ejecutar --}}
                wire:target="addItem"
                x-bind:disabled="!$wire.quantity"
                {{-- Desactivamos el boton cuando la cantidad sea mayor a 1 en qty--}}
                x-bind:disabled="$wire.qty > $wire.quantity"
                color="orange" class="w-full">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div> 
