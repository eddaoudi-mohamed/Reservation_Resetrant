<x-admin-layout>
    <x-slot name="content">
      <form action="{{route('admin.tables.store')}}"  method="post" class="w-full container md:w-2/3 mx-auto h-fit"> 
        @csrf
        <h1  class=" text-white mb-4 text-xl my-2 text-center font-bold">Create Table</h1>
        <div class="mb-5">
            <label for="name" class="block mb-4 font-semibold text-sm  text-gray-900 dark:text-white"  >Name</label>
            <input type="text" value="{{old('name')}}" id="name" name="name" class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name')
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
        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status:</label>

        <select id="status" name="status"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          {{-- <option selected>Choose a category</option> --}}
          <option value="available" selected >Available</option>
          <option value="notavailable">Notavailable</option>
          <option value="pending">Pending</option>
          
        </select>
        @error('status')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
        @enderror
      </div>
      <div class="mb-5"> 
        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location:</label>
        <select id="location" name="location"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          {{-- <option selected>Choose a category</option> --}}
          @foreach  (\App\Enums\tableLocation::cases() as $item)
            <option value="{{$item->value}}" selected >{{$item->name}} </option>
          @endforeach
        </select>
        @error('location')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
        @enderror
      </div>

        <button type="submit" class="p-2.5 text-sm font-medium w-full bg-indigo-500 hover:bg-indigo-700 text-lime-50 rounded-lg" >Create Table</button>
     </form>


    </x-slot>
</x-admin-layout>