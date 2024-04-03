<x-admin-layout>
  <x-slot name="content">
    <form action="{{route('admin.menus.update' , ['menu'=>$menu->id])}}" enctype="multipart/form-data" method="post" class="w-full container md:w-2/3 mx-auto h-fit"> 
      @csrf
      @method("PUT")
      <h1  class=" text-white mb-4 text-xl my-2 text-center font-bold">Update Menu</h1>
      <div class="mb-5">
          <label for="name" class="block mb-4 font-semibold text-sm  text-gray-900 dark:text-white"  >Name</label>
          <input type="text" value="{{$menu->id}}" id="name" name="name" class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('name')
             <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
          @enderror
      </div>

      <div class="mb-5">
          <label for="description" class="block mb-4 font-semibold text-sm  text-gray-900 dark:text-white">Description</label>
          <input type="text" value="{{$menu->description}}" id="description"  name="description" class="bg-gray-50 h-14 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('description')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
          @enderror
      </div>


    <div class="mb-5 ">
      <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price menu:</label>
      <input type="number" id="number-input" name="price" value="{{$menu->price}}" class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90210" required />
      @error('price')
      <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
      @enderror
    </div>

      <div class="mb-5">
          <label for="image" class="block mb-4 font-semibold text-sm  text-gray-900 dark:text-white">Uploade Image</label>
          <input  id="image"  name="image" class="block w-full  text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
          {{-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF</p> --}}
          @error('image')
               <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
          @enderror
      </div>

      <div class="mb-5"> 
        <select id="categories" name="categories[]" multiple="multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          {{-- <option selected>Choose a category</option> --}}
          @foreach ($categories as $item)
          <option value="{{$item->id}}" @selected($menu->categories->contains($item->id))>{{$item->name}}</option>
          @endforeach
        </select>
        @error('categories')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p> 
        @enderror
      </div>

      <button type="submit" class="p-2.5 text-sm font-medium w-full bg-indigo-500 hover:bg-indigo-700 text-lime-50 rounded-lg" >Update Menu</button>
   </form>


  </x-slot>
</x-admin-layout>