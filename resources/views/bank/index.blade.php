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
                    <table class="min-w-full bg-white table-auto">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    User</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Credit</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Debit</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-slate-100 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $key => $bank)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $bank->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $bank->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $bank->credit }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $bank->debit }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($bank->status === 'pending')
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-yellow-600 rounded-full mr-2"></div>
                                                <p class="text-yellow-600">Pending</p>
                                            </div>
                                        @elseif ($bank->status === 'success')
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-green-600 rounded-full mr-2"></div>
                                                <p class="text-green-600">Success</p>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="">
                                            <a href="" class="p-2 px-4 text-white rounded-full bg-blue-600"
                                                target="_blank">
                                                Top Up
                                            </a>
                                        </div>
                                    </td>
                                </tr>
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
