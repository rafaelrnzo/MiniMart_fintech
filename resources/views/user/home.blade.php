@extends('layouts.app')

@section('content')
    <div class="relative">
        <div class="flex-col justify-center h-full relative">
            <header class="w-full bg-white h-auto sticky top-0 z-50">
                <div class="px-24 p-3 flex flex-row justify-between items-center">
                    <div class="flex flex-row justify-between bg-blue-600 p-2 px-4 rounded-full w-auto gap-3">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-2xl text-white">
                                wallet
                            </span>
                            <span class="text-base font-medium text-white">Rp{{ $saldo }}</span>
                        </div>
                        <div class="h-auto">
                            <div x-data="{ showModal: false }">
                                <button @click="showModal = true"
                                    class="relative rounded-full border border-slate-400 bg-white p-1 flex items-center justify-center">

                                    <span class="material-icons w-auto text-blue-600 ">add</span>
                                </button>
           
                                <div x-show="showModal"
                                    class=" center fixed inset-0 items-center justify-center z-50 hidden w-screen h-screen bg-black bg-opacity-50">
                                    <!-- Modal Container -->
                                    <form action="{{ route('topUp') }}" method="post">
                                        @csrf
                                        <div
                                            class="fixed flex inset-0 items-center justify-center w-full md:max-w-md mx-auto z-50 ">
                                            <!-- Modal Content -->
                                            <div class="modal-content w-11/12 text-left py-3 bg-white rounded-md">
                                                <div class="flex justify-between items-center px-4 p-2">
                                                    <p class="text-xl font-bold">Top Up</p>
                                                </div>
                                                <div class="flex justify-between items-center px-4 p-2 w-full">
                                                    <div class="mb-2 w-full">
                                                        <label class="block text-sm text-black mb-2">Input Value</label>
                                                        <input
                                                            class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                            placeholder="Length" type="number" min="10000"
                                                            max="1000000" step="10000" x-model="charsLength"
                                                            id="amount" name="amount" />
                                                    </div>
                                                </div>
                                                <div class="flex justify-end items-center px-4  gap-2">
                                                    <button action="" type="submit" @click="showModal = false"
                                                        class="modal-close cursor-pointer border-2 border-blue-600 w-1/4 font-medium text-md text-blue-600 px-4 py-2 rounded-full  hover:">Cancel</button>
                                                    <button action="" type="submit"
                                                        class="bg-blue-600 w-1/4 font-medium text-md text-white px-4 py-2 rounded-full  hover:">Top
                                                        Up</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="relative rounded-full border border-slate-400 bg-slate-100">
                            <input type="text"
                                class="bg-slate-100 w-full py-2 pl-12 pr-3 rounded-full focus:outline-none"
                                placeholder="Search...">
                            <span
                                class="material-icons absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">search</span>
                        </div>
                        <div
                            class="relative rounded-full border border-slate-400 bg-slate-100 w-11 flex items-center justify-center">

                            <span class="material-icons-outlined w-auto text-slate-400">shopping_cart</span>
                        </div>

                    </div>
                </div>
            </header>

            <div class="px-24 flex flex-row w-full gap-6 py-6 h-auto relative">
                <div class="w-1/4 flex flex-col gap-6 relative">
                    <div class="w-full h-auto shadow-sm bg-white p-5 rounded-xl justify-between flex flex-col sticky ">
                        <div class="pb-2">
                            <p class="font-semibold text-xl">Keranjang</p>
                        </div>
                        <div class="gap-1 flex flex-col">
                            @foreach ($carts as $key => $cart)
                                <div class="flex-row flex justify-between w-full">
                                    <p>({{ $cart->quantity }}) {{ $cart->product->name }}</p>
                                    <p>{{ $cart->price * $cart->quantity }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex flex-col border-t-[1px] mt-3 pt-4 border-slate-400 gap-3">
                            <div class="flex-row flex justify-between w-full">
                                <p class="font-semibold text-lg">Total</p>
                                <p class="font-semibold text-lg">Rp{{ $total_biaya }}</p>
                            </div>
                            <form action="{{ route('pay') }}" method="post">
                                <div class="bg-blue-600 p-2 rounded-full">
                                    @csrf
                                    <button class="w-full font-medium text-lg text-white" type="submit">Beli</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="w-full h-auto shadow-sm bg-white p-5 rounded-xl justify-between flex flex-col sticky ">
                        <div class="pb-2">
                            <p class="font-semibold text-xl">Mutasi</p>
                        </div>
                        <div class="gap-1 flex flex-col">
                            @foreach ($mutasi as $data)
                                <div class="flex-row flex justify-between w-full border-t-[1px] border-slate-400 py-1">
                                    <p>({{ $data->credit ? $data->credit : 'Debit' }}) </p>
                                    <p> {{ $data->debit ? $data->debit : 'Debit' }}</p>

                                </div>
                                <p>{{ $data->description }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-3/4 ">
                    <div class="grid grid-cols-4 w-full gap-6">
                        @foreach ($all_product as $product)
                            <form action="{{ route('addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <div class="flex flex-col rounded-md gap-2 shadow-sm bg-white">
                                    <div class="">
                                        <img class="rounded-t-md object-cover h-40 w-full" src="{{ $product->photo }}"
                                            alt="" srcset="">
                                    </div>
                                    <div class="flex flex-col px-4 h-1/4">
                                        <span
                                            class="font-semibold text-blue-600 text-sm">{{ $product->category->name }}</span>
                                        <div class="flex justify-between">

                                            <span class=" text-black text-base">{{ $product->name }}</span>
                                            <span class="font-semibold ">Rp{{ $product->price }}</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-row justify-between p-3 pt-0 px-0 items-center">
                                        <div class="w-auto ">
                                            <input class="w-10 ml-2 pl-2 rounded-full bg-slate-100" type="number"
                                                name="quantity" value="1" min="1" />
                                            {{-- <input type="number" id="numberInput" name="numberInput"
                                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                         > --}}
                                        </div>
                                        <div
                                            class="border border-blue-600 px-3 p-1 rounded-full mx-2 w-auto hover:bg-blue-600 transition-all ease-in-out duration-300">
                                            <button action="" type="submit"
                                                class="w-full font-medium text-md text-blue-600 hover:text-white">add to
                                                cart</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach

                    </div>

                </div>

            </div>

            {{-- <div class="">
      <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif

              {{ __('You are logged in!') }}
          </div>
      </div>  
  </div> --}}
        </div>
    </div>
    <script>
        // This script handles the modal visibility toggle
        document.addEventListener('DOMContentLoaded', function() {
            const showModalButton = document.querySelector('[x-data="{ showModal: false }"]     button');
            const modalBackground = document.querySelector('[x-show="showModal"]');
            const closeModalButton = modalBackground.querySelector('.modal-close');

            showModalButton.addEventListener('click', function() {
                modalBackground.style.display = 'block';
            });


            closeModalButton.addEventListener('click', function() {
                modalBackground.style.display = 'none';
            });
        });
    </script>
@endsection
