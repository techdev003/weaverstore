
@extends('partials.layout')

@section('content')

<main class="p-5">
      <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <h1 class="text-3xl font-bold mb-6">My Orders</h1>

        <div class="bg-white p-3 rounded-md shadow-md">
          <table class="table table-auto w-full">
            <thead class="border-b-2">
              <tr class="text-left">
                <th>Order</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th class="w-64">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($orderData as $order)
            <?php

           $dateTime = new DateTime($order->created_at);
          $formattedDate = $dateTime->format("M j, h:ia");
          ?>
              <tr class="border-b">
                <td>
                  <a
                    href=""
                    class="text-purple-600 hover:text-purple-500"
                  >
                    #000{{$order->id}}
                  </a>
                </td>
                <td>{{$formattedDate}}</td>
                <td>
                <?php if($order->status) { ?>
                  <span class="bg-emerald-500 text-white p-1 rounded">{{$order->status?$order->status:'pending'}}</span>
                  <?php } ?>
                </td>
                <td>${{$order->total}}</td> 
                <td class="flex gap-3">
                  <div x-data="{open: false}">
             
                    <template x-teleport="body">
                      <!-- Backdrop -->
                      <div
                        x-show="open"
                        class="fixed flex justify-center items-center left-0 top-0 bottom-0 right-0 z-10 bg-black/80"
                      >
                        <!-- Dialog -->
                        <div
                          x-show="open"
                          x-transition
                          @click.outside="open = false"
                          class="w-[90%] md:w-1/2 bg-white rounded-lg"
                        >
                          <!-- Modal Title -->
                          <div
                            class="py-2 px-4 text-lg font-semibold bg-gray-100 rounded-t-lg flex items-center justify-between"
                          >
                            <h2>Modal Title</h2>
                            <button @click="open = false">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M6 18L18 6M6 6l12 12"
                                />
                              </svg>
                            </button>
                          </div> 
                          <!-- Modal Body -->
                     
                          <!-- Modal Footer -->
                          <div
                            class="py-2 px-4 text-lg flex justify-end font-semibold bg-gray-100 rounded-b-lg"
                          >
                            <button
                              @click="open = false"
                              class="inline-flex items-center py-1 px-3 bg-gray-300 hover:bg-opacity-95 text-gray-800 rounded-md shadow"
                            >
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </div>
                  <button class="btn-primary py-1 px-2 flex items-center">
                      <a href="{{ route('orderDetails.view', $order->id) }}">
                      View</a> </button>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </body>
</html>

@endsection