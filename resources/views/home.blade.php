@extends('layouts.app')

@section('content')
    <div class="">
        <div class="flex-col justify-center h-full">
            <div class="w-full bg-slate-100 h-auto">
                <div class="px-24 p-3 flex flex-row justify-between items-center">
                    <div class="flex flex-row justify-between bg-white p-2 px-4 rounded-full w-auto gap-3">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-2xl text-blue-600">
                                wallet
                            </span>
                            <span class="text-base font-semibold ">Rp{{ $saldo }}</span>
                        </div>
                        <div
                            class="relative rounded-full border border-slate-400 bg-blue-600 p-1 flex items-center justify-center">

                            <span class="material-icons w-auto text-white ">add</span>
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
            </div>

            <div class="px-24 flex flex-row w-full gap-6 py-6 h-auto relative">
                <div class="w-1/4 flex flex-col gap-6">
                    <div class="w-full h-full border border-slate-400 p-5 rounded-xl justify-between flex flex-col sticky ">
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
                    <div class="w-full h-full border border-slate-400 p-5 rounded-xl justify-between flex flex-col sticky ">
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
                </div>
                <div class="w-3/4 ">
                    <div class="grid grid-cols-4 w-full gap-6">
                        @foreach ($all_product as $product)
                            <form action="{{ route('addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <div class="flex flex-col rounded-xl gap-2 border border-slate-400">
                                    <div class="">
                                        <img class="rounded-t-xl object-cover h-40 w-full" src="{{ $product->photo }}"
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
                                        <div class="w-1 bg-slate-100">
                                            <input class="w-10 ml-2 bg-slate-100" type="number" name="quantity"
                                                value="1" min="1" />
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
@endsection
