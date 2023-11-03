@extends('layouts.admin')

@section('sidebar')
    <a href="{{ route('kantin') }}"
        class="text-base font-semibold h-auto w-full flex items-center gap-1 p-3 px-4 rounded-lg 
{{ request()->routeIs('kantin') ? 'bg-blue-600 text-white' : 'text-blue-600' }}">
        <span class="material-symbols-outlined">
            fastfood
        </span>
        <span class="">
            Product
        </span>
    </a>
    <a href="{{ route('accept') }}"
        class="text-base font-semibold h-auto w-full flex items-center gap-1 p-3 px-4 rounded-lg 
{{ request()->routeIs('accept') ? 'bg-blue-600 text-white' : 'text-blue-600' }}">
        <span class="material-symbols-outlined">
            history
        </span>
        <span class="">
            Transaction
        </span>
    </a>
@endsection

@section('content')
    <div class="relative h-full">
        <div class="gap-1 flex flex-col ">
            <div class="flex justify-between items-center">
                <span class="text-xl font-semibold">Products</span>
                <div x-data="{ showModal: false }">
                    <button @click="showModal = true"
                        class="rounded-lg bg-blue-600 p-4 py-2 flex items-center justify-between text-white">
                        <span class="material-icons w-auto ">add</span>
                        <p class="text-base">Add Products</p>
                    </button>

                    <div x-show="showModal"
                        class=" center fixed inset-0 items-center justify-center z-50 hidden w-screen h-screen bg-black bg-opacity-50">
                        <form action="{{ route('product.store') }}" method="post" class="w-full h-auto">
                            @csrf
                            <div class="fixed flex inset-0 items-center justify-center w-full md:max-w-lg mx-auto z-50 ">
                                <div class="modal-content w-full text-left py-3 bg-white rounded-md">
                                    <div class="flex justify-between items-center px-4 p-2">
                                        <p class="text-xl font-bold">Add New Product</p>
                                    </div>
                                    <div class="flex  justify-between items-center px-4  w-full">
                                        <div class="mb-2 w-full">
                                            <label class="block text-sm text-black mb-2">Name</label>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="Name" type="text" min="500" value=""
                                                x-model="charsLength" id="name" name="name" />
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center px-4 p-2 w-full gap-4">

                                        <div class="mb-2 w-full">
                                            <label class="block text-sm text-black mb-2">Price</label>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="Length" type="number" min="500" value="0"
                                                max="1000000" step="500" x-model="charsLength" id="price"
                                                name="price" />
                                        </div>
                                        <div class="mb-2 w-full">
                                            <label class="block text-sm text-black mb-2">Category</label>
                                            <select
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="Length" type="number" min="500" value="0"
                                                max="1000000" step="10000" x-model="charsLength" id="category"
                                                name="category">
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center px-4 p-2 w-full gap-4">
                                        <div class="mb-2 w-full">
                                            <label class="block text-sm text-black mb-2">Stock</label>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="Length" type="number" min="1" value="0"
                                                max="1000000" step="5" x-model="charsLength" id="stock"
                                                name="stock" />
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center px-4  w-full">
                                        <div class="mb-2 w-full">
                                            <label class="block text-sm text-black mb-2">Description</label>
                                            <textarea
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="Name" type="text" min="500" value="" x-model="charsLength" id="description"
                                                name="description"> </textarea>
                                        </div>
                                    </div>

                                    <div class="flex  justify-between items-center px-4  w-full">
                                        <div class="mb-2 w-full">
                                            <label class="block text-sm text-black mb-2">Image Link</label>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="https://image" type="text" min="500" value=""
                                                x-model="charsLength" id="photo" name="photo" />
                                        </div>
                                    </div>
                                    <div class="flex justify-end items-center px-4 py-2 gap-2">
                                        <button action="" type="submit" @click="showModal = false"
                                            class="modal-close cursor-pointer border-2 border-blue-600 w-1/4 font-medium text-md text-blue-600 px-4 py-2 rounded-lg  hover:">Cancel</button>
                                        <button action="" type="submit"
                                            class="bg-blue-600 w-1/4 font-medium text-md text-white px-4 py-2 rounded-lg  hover:">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-auto w-full rounded-lg mt-4 flex-col grid grid-cols-5 gap-4">
            @foreach ($all_products as $product)
                <div class="flex flex-col rounded-md w-full shadow-sm bg-white">
                    <div class="">
                        <img class="rounded-t-md object-cover h-40 w-full border-b border-slate-200"
                            src="{{ $product->photo }}" alt="" srcset="">
                    </div>
                    <div class="flex flex-col p-4 h-auto justify-around">
                        <div class="flex justify-start gap-1">
                            <span class="font-base ">Name:</span>
                            <span class=" text-black text-base font-semibold">{{ $product->name }}</span>
                        </div>
                        <div class="flex justify-start gap-1">
                            <span class="font-base ">Price:</span>
                            <span class=" text-black text-base font-semibold">{{ $product->price }}</span>
                        </div>
                        <div class="flex justify-start gap-1">
                            <span class="font-base ">Category:</span>
                            <span class=" text-black text-base font-semibold">{{ $product->category->name }}</span>
                        </div>
                        <div class="flex justify-start gap-1">
                            <span class="font-base ">Stock:</span>
                            <span class=" text-black text-base font-semibold">{{ $product->stock }}</span>
                        </div>
                    </div>
                    <div class="border-t border-slate-200 flex p-4 w-full gap-2">
                        <!-- Open the modal using ID.showModal() method -->
                        <button class=" button w-full border-blue-600 border p-4 py-2 rounded-lg text-blue-600 font-medium"
                            onclick="my_modal_{{ $product->id }}.showModal()">Edit</button>
                        <dialog id="my_modal_{{ $product->id }}" class="modal modal-bottom sm:modal-middle">
                            <form action="{{ route('product.update', $product->id) }}" method="post"
                                class="w-full h-auto modal-box rounded-lg">
                                @csrf
                                @method('put')
                                <div class="flex items-center justify-center w-full  z-50 ">
                                    <div class="modal-content w-full text-left py-3 bg-white rounded-md">
                                        <div class="flex justify-between items-center px-4 p-2">
                                            <p class="text-xl font-bold">Edit Product</p>
                                        </div>
                                        <div class="flex  justify-between items-center px-4  w-full">
                                            <div class="mb-2 w-full">
                                                <label class="block text-sm text-black mb-2">Name</label>
                                                <input
                                                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="Name" type="text" min="500"
                                                    value="{{ $product->name }}" x-model="charsLength" id="name"
                                                    name="name" />
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center px-4 p-2 w-full gap-4">

                                            <div class="mb-2 w-full">
                                                <label class="block text-sm text-black mb-2">Price</label>
                                                <input
                                                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="Length" type="number" min="500" max="1000000"
                                                    step="500" value="{{ $product->price }}" x-model="charsLength"
                                                    id="price" name="price" />
                                            </div>
                                            <div class="mb-2 w-full">
                                                <label class="block text-sm text-black mb-2">Category</label>
                                                <select
                                                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="Length" type="number" min="500"
                                                    value="{{ $product->category }}" max="1000000" step="10000"
                                                    x-model="charsLength" id="category" name="category">
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center px-4 p-2 w-full gap-4">
                                            <div class="mb-2 w-full">
                                                <label class="block text-sm text-black mb-2">Stock</label>
                                                <input
                                                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="Length" type="number" min="0"
                                                    value="{{ $product->stock }}" max="1000000" step="1"
                                                    x-model="charsLength" id="stock" name="stock" />
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center px-4  w-full">
                                            <div class="mb-2 w-full">
                                                <label class="block text-sm text-black mb-2">Description</label>
                                                <textarea
                                                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="Name" type="text" min="500" value="{{ $product->description }}" x-model="charsLength"
                                                    id="description" name="description"> </textarea>
                                            </div>
                                        </div>

                                        <div class="flex  justify-between items-center px-4  w-full">
                                            <div class="mb-2 w-full">
                                                <label class="block text-sm text-black mb-2">Image Link</label>
                                                <input
                                                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="https://image" type="text" min="500"
                                                    value="{{ $product->photo }}" x-model="charsLength" id="photo"
                                                    name="photo" />
                                            </div>
                                        </div>
                                        <div class="flex justify-end items-center px-4 py-2 gap-2">
                                            <form method="dialog">
                                                <!-- if there is a button in form, it will close the modal -->
                                                <button
                                                    class=" border border-blue-600 w-1/4 font-medium text-md text-blue-600 px-4 py-2 rounded-lg ">Close</button>
                                            </form>
                                            <button action="" type="submit"
                                                class="bg-blue-600 w-1/4 font-medium text-md text-white px-4 py-2 rounded-lg  hover:">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </dialog>
                        {{-- <button
                            class="w-3/4 border-blue-600 border p-4 py-2 rounded-lg text-blue-600 font-medium">Edit</button> --}}

                        <form action="{{ route('deleteProduct', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-auto bg-blue-600 p-4 py-2 rounded-lg text-white font-medium flex items-center justify-center">
                                <span class="material-icons text-lg">delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
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

        // document.addEventListener('DOMContentLoaded', function() {
        //     const showModalButtons = document.querySelectorAll('[x-data="{ showModalEdit: false }"] button');

        //     showModalButtons.forEach((button, index) => {
        //         const modalBackground = document.querySelectorAll('[x-show="showModalEdit"]')[index];
        //         const closeModalButton = modalBackground.querySelector('.modal-close-1');

        //         button.addEventListener('click', function() {
        //             modalBackground.style.display = 'block';
        //         });

        //         closeModalButton.addEventListener('click', function() {
        //             modalBackground.style.display = 'none';
        //         });
        //     });
        // });

        $(document).ready(function() {
            $('.showModalEdit').on('click', function(e) {
                e.preventDefault();

                // Get the target modal ID from the data-target attribute
                const targetModal = $(this).data('target');

                // Show the corresponding modal
                $('#' + targetModal).show();
            });

            $('.modal .close').on('click', function() {
                // Close the clicked modal
                $(this).closest('.modal').hide();
            });
        });
    </script>
@endsection
