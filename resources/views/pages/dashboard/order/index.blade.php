@extends('layouts.app')

@section('title', 'My Order')
@section('content')
    @if (count($orders))
        <main class="h-full overflow-y-auto">
            <div class="container mx-auto">
                <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                    <div class="col-span-8">
                        <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                            My Orders
                        </h2>
                        <p class="text-sm text-gray-400">
                            {{ count($orders) }} Total Orders
                        </p>
                    </div>
                    <div class="col-span-4 lg:text-right">

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
                                    @forelse ($orders as $order_item)
                                        <tr class="text-gray-700 border-b">
                                            <td class="px-1 py-5 text-sm w-2/8">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                        @if ($order_item->user_buyer->detail_user->photo != null)
                                                            <img class="object-cover w-full h-full rounded-full" src="{{ Storage::url($order_item->user_buyer->detail_user->photo) }}" alt="" loading="lazy" />
                                                        @else
                                                            <span class="object-cover w-full h-full rounded-full">
                                                                <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                                </svg>
                                                            </span>
                                                        @endif
                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-black">{{ $order_item->user_buyer->name }}</p>
                                                        <p class="text-sm text-gray-400">{{ $order_item->user_buyer->detail_user->role }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="w-2/6 px-1 py-5">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                        @if (isset($order_item->service->thumbnail_service[0]->thumbnail))
                                                            <img class="object-cover w-full h-full rounded" src="{{ Storage::url($order_item->service->thumbnail_service[0]->thumbnail) }}" alt="" loading="lazy" />
                                                        @else
                                                            <img class="object-cover w-full h-full rounded" src="{{ asset('/assets/service/notfound.png') }} alt="" loading="lazy" />
                                                        @endif
                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('member.order.show', $order_item->id) }}" target="__blank" class="font-medium text-black">
                                                            {{ $order_item->service->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-1 py-5 text-xs text-red-500">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mb-1">
                                                    <path d="M7.0002 12.8332C10.2219 12.8332 12.8335 10.2215 12.8335 6.99984C12.8335 3.77818 10.2219 1.1665 7.0002 1.1665C3.77854 1.1665 1.16687 3.77818 1.16687 6.99984C1.16687 10.2215 3.77854 12.8332 7.0002 12.8332Z" stroke="#F26E6E" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7 3.5V7L9.33333 8.16667" stroke="#F26E6E" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                                {{ (strtotime($order_item->expired) - strtotime(date('Y-m-d'))) / 86400 }} days left
                                            </td>
                                            <td class="px-1 py-5 text-sm">
                                                @switch($order_item->order_status->id)
                                                    @case(1)
                                                        <a href="javascript:void(0)" onclick="return alert('status sudah di approve oleh buyer')" class="px-4 py-2 mt-2 mr-2 text-left text-white rounded-xl bg-serv-button">
                                                            Approved
                                                        </a>
                                                        <a href="{{ route('member.order.edit', $order_item->id) }}" class="px-4 py-2 mt-2 text-center text-white rounded-xl bg-serv-email">
                                                            Submit
                                                        </a>
                                                    @break
                                                    @case(2)
                                                        <a href="{{ route('member.waiting.order', $order_item->id) }}" onclick="return confirm('Do you wont to change to waiting?')" class="px-4 py-2 mt-2 mr-2 text-white text-left bg-sky-700 rounded-xl">
                                                            Waiting
                                                        </a>
                                                        <a href="{{ route('member.order.edit', $order_item->id) }}" class="px-4 py-2 mt-2 text-center text-white rounded-xl bg-serv-email">
                                                            Submit
                                                        </a>
                                                    @break
                                                    @case(3)
                                                        <p class="px-4 py-2 mt-2 inline text-left text-red-500">
                                                            Rejected
                                                        </p>
                                                        <a href="{{ route('member.accept.order', $order_item->id) }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                                            Accept
                                                        </a>
                                                    @break
                                                    @case(4)
                                                        <a href="{{ route('member.accept.order', $order_item->id) }}" class="px-4 mr-2  py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                                            Accept
                                                        </a>
                                                        <a href="{{ route('member.reject.order', $order_item->id) }}" onclick="return confirm('Do you wont to reject?')" class="px-4 py-2 mt-2 text-white text-left bg-red-400 rounded-xl">
                                                            Reject
                                                        </a>
                                                    @break
                                                        
                                                @endswitch
                                            </td>
                                        </tr>
                                    @empty
                                        {{ 'notfound' }}
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
            </section>
        </main>
    @else
        <div class="flex h-screen">
            <div class="m-auto text-center">
                <img src="{{ asset('/assets/images/empty-illustration.svg') }}" alt="" class="w-48 mx-auto">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    There is No Order Yet
                </h2>
                <p class="text-sm text-gray-400">
                Looks like no orders have come in yet
                </p>
            </div>
        </div>
    @endif
@endsection