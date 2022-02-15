@extends('layouts.app')

@section('title', 'My Order')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        My Orders
                    </h2>
                    <p class="text-sm text-gray-400">
                        1 Total Orders
                    </p>
                </div>
            </div>
        </div>
        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                        <table class="w-full" aria-label="Table">
                            <thead>
                                <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                    <th class="py-4" scope="">Buyers Name</th>
                                    <th class="py-4" scope="">Service Details</th>
                                    <th class="py-4" scope="">Expires</th>
                                    <th class="py-4" scope="">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="text-gray-700 border-b">
                                    <td class="w-2/6 px-1 py-5">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="https://randomuser.me/api/portraits/men/6.jpg" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                             <div>
                                                <p class="font-medium text-black">Alexa Sara</p>
                                                <p class="text-sm text-gray-400">087785091245</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-2/6 px-1 py-5">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded" src="https://randomuser.me/api/portraits/men/3.jpg" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-black">
                                                    Design WordPress <br>E-Commerce Modules
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-1 py-5 text-sm">
                                        Rp120.000
                                    </td>
                                    <td class="px-1 py-5 text-sm">
                                        <a href="{{ route('member.order.edit', 1) }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </section>
    </main>
@endsection