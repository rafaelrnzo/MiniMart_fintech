@extends('layouts.admin')
@section('sidebar')
    <a href="{{ route('admin') }}"
        class="text-base font-semibold h-auto w-full flex items-center gap-1 p-3 px-4 rounded-lg 
{{ request()->routeIs('admin') ? 'bg-blue-600 text-white' : 'text-blue-600' }}">
        <span class="material-symbols-outlined">
            dashboard
        </span>
        <span class="">
            Dashboard
        </span>
    </a>
    {{-- <a href="{{ route('') }}"
        class="text-base font-semibold h-auto w-full flex items-center gap-1 p-3 px-4 rounded-lg 
{{ request()->routeIs('') ? 'bg-blue-600 text-white' : 'text-blue-600' }}">
        <span class="material-symbols-outlined">
            person
        </span>
        <span class="">
            User
        </span>
    </a> --}}
@endsection
@section('content')
    <div class="relative h-full">
        <div class="gap-4 flex flex-col h-full">
            <div class="flex flex-col justify-start items-start gap-4">
                <span class="text-3xl font-semibold">Top Up</span>
                <div class=" flex-row grid grid-cols-3 gap-4 w-full">
                    <div class=" h-auto flex flex-row items-center gap-4 p-4 bg-white rounded-lg ">
                        <button
                            class="h-full w-auto flex items-center gap-1 bg-blue-600  px-6 rounded-lg font-sans text-md text-white  font-medium">
                            <span class="material-icons text-3xl ">
                                person
                            </span>
                        </button>
                        <div class="flex flex-col font-semibold">
                            <span class="text-lg font-normal">Client</span>
                            <span class="text-3xl">{{ $total_user }}</span>
                        </div>
                    </div>
                    <div class=" h-auto flex flex-row items-center gap-4 p-4 bg-white rounded-lg ">
                        <button
                            class="h-full w-auto flex items-center gap-1 bg-blue-600  px-6 rounded-lg font-sans text-md text-white  font-medium">
                            <span class="material-icons text-3xl ">
                                wallet
                            </span>
                        </button>
                        <div class="flex flex-col font-semibold">
                            <span class="text-lg font-normal">Teller</span>
                            <span class="text-3xl">{{ $total_teller }}</span>
                        </div>
                    </div>
                    <div class=" h-auto flex flex-row items-center gap-4 p-4 bg-white rounded-lg ">
                        <button
                            class="h-full w-auto flex items-center gap-1 bg-blue-600  px-6 rounded-lg font-sans text-md text-white  font-medium">
                            <span class="material-icons text-3xl ">
                                pending
                            </span>
                        </button>
                        <div class="flex flex-col font-semibold">
                            <span class="text-lg font-normal">Total Transaction</span>
                            <span class="text-3xl">{{ $transaction_count }}</span>
                        </div>
                    </div>

                </div>
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
                    <table class="min-w-full bg-white table-auto">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Email</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Password</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Role</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_users as $key => $item)
                                {{-- @if ($item->credit != null) --}}
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $key + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $item->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $item->password }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $item->role }}
                                        </td>
                                  
                                       
                                    </tr>
                                {{-- @endif --}}
                            @endforeach

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
