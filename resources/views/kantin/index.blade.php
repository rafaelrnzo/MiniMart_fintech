@extends('layouts.admin')

@section('content')
    <div class="relative h-full">
        <div class="gap-1 flex flex-col h-full">
            <div class="flex justify-between items-center">
                <span class="text-xl font-semibold">Products</span>
                <button
                    class="h-auto w-auto flex items-center gap-1 p-2 px-4 bg-blue-600 rounded-lg font-sans text-md text-white  font-medium">
                    <span class="material-symbols-outlined text-xl ">
                        add
                    </span>
                    <span class="">Add</span>
                </button>
            </div>
            <div class="h-full w-full rounded-lg mt-4 flex-col grid grid-cols-3 gap-4">
                @foreach ($all_products as $item)
                    <div class=" h-auto flex flex-row items-center gap-4 p-4 bg-white rounded-lg ">
                        <div
                            class="h-full w-auto flex items-center gap-1 rounded-lg font-sans text-md text-white  font-medium">
                            <img src="{{ $item->photo }}" alt="" srcset="" class="object-cover rounded-lg w-28 h-28">
                        </div>
                        <div class="flex flex-col">
                            <p class="text-xl font-semibold capitalize">{{ $item->name }}</p>
                            <p class="text-base font-base text-slate-400">{{ $item->category->name }}</p>
                            <p class="text-lg font-semibold text-blue-600">{{ $item->price }}K</p>
                            <span class="text-base font-base ">{{ $item->description }}</span>
                        </div>
                        <div class="flex flex-col  ">
                        </div>
                    </div>
                @endforeach
            </div>
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
