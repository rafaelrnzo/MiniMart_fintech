@extends('layouts.app')

@section('content')
    <div class="px-24 w-full h-auto flex gap-4 py-4">
        <div class="w-6/12 h-full shadow-sm bg-white p-5 rounded-xl justify-start flex flex-col ">
            <div class="pb-2">
                <p class="font-semibold text-2xl">History</p>
            </div>
            <div class="gap-2 flex flex-col">
                @foreach ($transactions as $transaction)
                    <div class="flex justify-between items-center p-4 rounded-xl bg-slate-100">
                        <div class="flex-col flex justify-between w-full">
                            <p class="font-semibold">{{ $transaction[0]->order_id }}</p>
                            <p>{{ $transaction[0]->created_at }}</p>
                        </div>
                        <div class="">
                            <a href="{{ route('download', ['order_id' => $transaction[0]->order_id]) }}"
                                class="p-2 px-4 text-white rounded-full bg-blue-600" target="_blank">
                                Download
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w-4/12 h-auto shadow-sm bg-white p-5 rounded-xl justify-between flex flex-col sticky ">
            <div class="pb-2">
                <p class="font-semibold text-xl">Mutation</p>
            </div>
            <div class="gap-1 flex flex-col">
                @foreach ($mutasi as $data)
                    <div class="flex-col flex justify-between w-full border-t-[1px] border-slate-400 py-1">
                        <div class="flex justify-between">

                            <p>({{ $data->credit ? $data->credit : 'Debit' }}) </p>
                            <p>Rp {{ $data->debit ? $data->debit : 'Debit' }}</p>
                        </div>
                        <div class="flex">

                            <p>{{ $data->description }}</p>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-3/12 h-full shadow-sm bg-white p-5 rounded-xl justify-between flex flex-col sticky ">
            <div class="pb-2">
                <p class="font-semibold text-xl">Profile</p>
            </div>
           
        </div>
    </div>
@endsection
