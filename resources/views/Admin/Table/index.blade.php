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
                <h1  class=" text-white mb-4 text-xl" >Tables</h1>
                <div class=" flex justify-end mx-3 my-4">
                    <a href="{{route('admin.tables.create')}}" class=" px-3 py-2 bg-indigo-500 text-lime-50 hover:bg-indigo-700 rounded-md" >New Tables</a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Guest Number
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Location
                                </th>
                                 <th scope="col" class="px-6 py-4">
                                    Status
                                 </th>
                                <th scope="col" class="px-6 py-4">
                                    Actions 
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tables as $item)
                                
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$item->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$item->guest_number}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                       {{$item->location }}
                                    </td>
                                   
                                    <td class="px-6 py-4 w-fit text-white">
                                        <span class=" px-3 py-2 rounded-xl <?php if($item->status == 'pending'){echo' bg-yellow-300' ; }elseif ($item->status == "available") {
                                            echo " bg-green-400" ; 
                                        } else {
                                             echo " bg-red-500" ; 
                                        } ?>">
                                           {{$item->status}}
                                       </span>
                                    </td> 
                                    <td class="px-6 py-4 flex h-fit gap-5 ">
                                        <a href="{{route('admin.tables.edit' , ['table'=>$item->id])}}" class="font-medium text-blue-600 h-fit dark:text-blue-500 hover:underline">Edit</a>
                                        <form  class=" h-fit my-auto" action="{{route('admin.tables.destroy' , ['table'=>$item->id])}}" method="post"> 
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
