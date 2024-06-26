<x-guest-layout>

    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($categories as $category)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{ Storage::url($category->image) }}" alt="Image" />
                     <a href="{{route('categories.show' , $category->id)}}" class=" py-8">
                        <h4 class="mb-3 mt-3 ml-3 text-lg font-semibold tracking-tight text-green-600 uppercase">
                            {{ $category->name }}</h4>
                    </a>
             
                </div>
            @endforeach
        </div>
    </div>
    
</x-guest-layout>