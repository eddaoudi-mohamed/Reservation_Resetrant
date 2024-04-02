<x-admin-layout>
    <x-slot name="content">  
        @if (session()->has("success"))
        <x-alert-success>
            <span>
                {{session()->get("success")}}
           </span>
        </x-alert-success>
        @endif  
        {{-- <img src="{{asset('/storage/images/1711897600.event.jpg')}}" alt="fsdfdsf" > --}}
            <div class=" container mx-auto">
                <h1  class=" text-white mb-4 text-xl" >Categories</h1>
                <div class=" flex justify-end mx-3 my-4">
                    <a href="{{route('admin.categories.create')}}" class=" px-3 py-2 bg-indigo-500 text-lime-50 hover:bg-indigo-700 rounded-md" >New Category</a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    description
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Actions 
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$item->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$item->description}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{asset(Storage::url($item->image))}}" class=" w-28 h-16 rounded" alt="">
                                    </td>
                                    <td class="px-6 py-4 flex h-fit gap-5 ">
                                        <a href="{{route('admin.categories.edit' , ['category'=>$item->id])}}" class="font-medium text-blue-600 h-fit dark:text-blue-500 hover:underline">Edit</a>
                                        <form  class=" h-fit my-auto" action="{{route('admin.categories.destroy' , ['category'=>$item->id])}}" method="post"> 
                                            @csrf
                                            @method("DELETE") 
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
    </x-slot>

 
</x-admin-layout>
