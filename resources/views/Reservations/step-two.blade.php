
<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        @if (session()->has("warning"))
        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 " role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">Warning !</span> {{session()->get('warning')}}
            </div>
          </div>

        @endif  
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img class="object-cover w-full h-full"
                            src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>

                            <div class="w-full bg-gray-200 rounded-full">
                                <div
                                    class="w-100 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                    Step 2</div>
                            </div>

                            <form method="POST" action="{{ route('reservations.store.step.two') }}">
                                @csrf
                                <div class="sm:col-span-6 pt-5">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Table</label>
                                    <div class="mt-1">
                                        <select id="table_id" name="table_id"
                                            class="form-multiselect block w-full mt-1">
                                            @foreach ($tables as $table)
                                                <option value="{{ $table->id }}" @selected($table->id == ($reservation->table_id ?? 1))>
                                                    {{ $table->name }}
                                                    ({{ $table->guest_number }} Guests)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('table_id')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-6 p-4 flex justify-between">
                                    <a href="{{ route('reservation.step.one') }}"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Previous</a>
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Make
                                        Reservation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>