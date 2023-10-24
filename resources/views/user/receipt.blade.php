<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>e-Receipt #{{ $transactions[0]->order_id }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
    <div id="app bg-green-900">
        <main class="py-4 w-full">
            <div class="flex flex-col w-full ">
                <div class=" px-5 flex justify-center flex-col text-center gap-2">
                    <div class="w-full h-4 border-dashed border-y-2 border-black "></div>
                    <p class="text-6xl font-bold">RECEIPT</p>
                    <p class="text-2xl">e-sada #{{ $transactions[0]->order_id }}</p>
                    <div class="w-full h-4 border-dashed border-y-2 border-black "></div>
                </div>
                <div class="flex flex-col gap-2 p-12 py-2">
                    @foreach ($transactions as $transaction)
                        <div class="flex text-2xl w-full">
                            <div class="flex justify-between w-full">
                                <div class="">
                                    <div class="flex text-end">
                                        {{ $transaction->quantity }} x
                                        {{ $transaction->product->name }}
                                    </div>
                                </div>
                                <div class="flex justify-between w-28">
                                    <p>Rp</p>
                                    <p>
                                        {{ $transaction->price * $transaction->quantity }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="mx-12 first-letter:w-full h-4 border-dashed border-b-2 border-black mb-4"></div>
                <div class="card-footer px-12" style="background-color: transparent;">
                    <div class="flex w-full justify-between text-3xl font-semibold">
                        <span>Total Amount : </span>
                        <span>Rp {{ $total_biaya }}</span>
                    </div>
                </div>
                <div class="mx-12 first-letter:w-full h-4 border-dashed border-b-2 border-black my-2"></div>
                <div class="text-5xl font-bold text-center">THANK YOU</div>
                <div class="mx-12 first-letter:w-full h-4 border-dashed border-b-2 border-black mt-2"></div>

            </div>
        </main>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
