<x-admin-layout>

    <x-slot name="content">
      @if (session()->has("warning"))
      <x-alert-warning>
          <span>
              {{session()->get("warning")}}
         </span>
      </x-alert-warning>
      @endif  
      
      <form action="{{route('admin.resarvations.store')}}"  method="post" class="w-full container md:w-2/3 mx-auto h-fit"> 
        @csrf
        <h1  class=" text-white mb-4 text-xl my-2 text-center font-bold">Create Reservation</h1>
        <div class="mb-5">
            <label for="name" class="block mb-4 font-semibold text-sm  text-gray-900 dark:text-white"  >Name</label>
            <input type="text" value="{{old('name')}}" id="name" name="name" class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name')
               <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
            @enderror
        </div>


      <div class="mb-5 ">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eamil:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90210"  />
        @error('email')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
        @enderror
      </div>


      <div class="mb-5 ">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90210"  />
        @error('phone')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
        @enderror
      </div>


      <div class="mb-5 ">
        <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest  number:</label>
        <input type="number" id="guest_number" name="guest_number" value="{{old('guest_number')}}" class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90210"  />
        @error('guest_number')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
        @enderror
      </div>

      <div class="mb-5">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Reservation</label>
        <input  type="datetime-local" name="res_date" value="{{old('res_date')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
          @error('res_date')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
          @enderror
      </div>


      <div class="mb-5"> 
        <label for="table_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Table</label>

        <select id="table_id" name="table_id"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          {{-- <option selected>Choose a category</option> --}} 
          @foreach ($tables as $item)
               <option value="{{$item->id}}"  >{{$item->name}} ({{$item->guest_number}} Guest)</option>
          @endforeach         
        </select>
        @error('table_id')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
        @enderror
      </div>

      <button type="submit" class="p-2.5 text-sm font-medium w-full bg-indigo-500 hover:bg-indigo-700 text-lime-50 rounded-lg" >Create Table</button>
     </form>


    </x-slot>
</x-admin-layout>