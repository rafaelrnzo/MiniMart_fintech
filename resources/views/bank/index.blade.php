@extends('layouts.app')

@section('content')
    <div class="relative">
        <div class="gap-1 flex flex-col">
            @foreach ($userNames as $key => $all)
                <div class="flex-row flex justify-between w-full">
                    <p>({{ $all->name }})</p>
                </div>
            @endforeach
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
