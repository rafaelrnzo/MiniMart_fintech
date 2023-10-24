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
            <div class="h-full w-full bg-white rounded-lg mt-2 p-4 flex-col flex">
                <div class="flex justify-between">
                    <div class="relative rounded-lg bg-slate-100">
                        <input type="text" class="bg-slate-100 w-full py-2 pl-12 pr-3 rounded-full focus:outline-none"
                            placeholder="Search...">
                        <span
                            class="material-icons absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">search</span>
                    </div>
                    <button
                        class="h-auto w-auto flex items-center gap-1 p-1 px-2 border-2 border-slate-400 rounded-lg font-sans text-md text-slate-400  font-medium">
                        <span class="material-symbols-outlined text-xl ">
                            sort
                        </span>
                        <span class="">Filter</span>
                    </button>

                </div>
                <div class="h-auto w-full mt-4">
                    <table class="table text-gray-400 border-separate space-y-6 text-sm">
                        <thead class="bg-gray-800 text-gray-500">
                            <tr>
                                <th class="p-3">Brand</th>
                                <th class="p-3 text-left">Category</th>
                                <th class="p-3 text-left">Price</th>
                                <th class="p-3 text-left">Status</th>
                                <th class="p-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-800">
                                <td class="p-3">
                                    <div class="flex align-items-center">
                                        <img class="rounded-full h-12 w-12  object-cover" src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="unsplash image">
                                        <div class="ml-3">
                                            <div class="">Appple</div>
                                            <div class="text-gray-500">mail@rgmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3">
                                    Technology
                                </td>
                                <td class="p-3 font-bold">
                                    200.00$
                                </td>
                                <td class="p-3">
                                    <span class="bg-green-400 text-gray-50 rounded-md px-2">available</span>
                                </td>
                                <td class="p-3 ">
                                    <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                        <i class="material-icons-outlined text-base">visibility</i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-100  mx-2">
                                        <i class="material-icons-outlined text-base">edit</i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-100  ml-2">
                                        <i class="material-icons-round text-base">delete_outline</i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-gray-800">
                                <td class="p-3">
                                    <div class="flex align-items-center">
                                        <img class="rounded-full h-12 w-12   object-cover" src="https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="unsplash image">
                                        <div class="ml-3">
                                            <div class="">Realme</div>
                                            <div class="text-gray-500">mail@rgmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3">
                                    Technology
                                </td>
                                <td class="p-3 font-bold">
                                    200.00$
                                </td>
                                <td class="p-3">
                                    <span class="bg-red-400 text-gray-50 rounded-md px-2">no stock</span>
                                </td>
                                <td class="p-3">
                                    <a href="#" class="text-gray-400 hover:text-gray-100  mr-2">
                                        <i class="material-icons-outlined text-base">visibility</i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
                                        <i class="material-icons-outlined text-base">edit</i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
                                        <i class="material-icons-round text-base">delete_outline</i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-gray-800">
                                <td class="p-3">
                                    <div class="flex align-items-center">
                                        <img class="rounded-full h-12 w-12   object-cover" src="https://images.unsplash.com/photo-1600856209923-34372e319a5d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2135&q=80" alt="unsplash image">
                                        <div class="ml-3">
                                            <div class="">Samsung</div>
                                            <div class="text-gray-500">mail@rgmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3">
                                    Technology
                                </td>
                                <td class="p-3 font-bold">
                                    200.00$
                                </td>
                                <td class="p-3">
                                    <span class="bg-yellow-400 text-gray-50  rounded-md px-2">start sale</span>
                                </td>
                                <td class="p-3">
                                    <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                        <i class="material-icons-outlined text-base">visibility</i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
                                        <i class="material-icons-outlined text-base">edit</i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
                                        <i class="material-icons-round text-base">delete_outline</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
