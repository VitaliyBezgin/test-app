<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($company->name) }}
        </h2>
    </x-slot>

    <div class="action mt-4 mb-4 d-flex justify-content-end">
        <a href="{{route('company.edit', $company->id)}}" class="btn btn-warning  mr-3">Edit</a>
        <form action="{{route('company.destroy', $company->id)}}" method="POST">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" value="Destroy" class="btn btn-danger">
        </form>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div>
                            Name -> {{$company->name}}
                        </div>
                        <div>
                            Email -> {{$company->email}}
                        </div>
                        <div>
                            Website -> {{$company->website ?? 'empty --'}}
                        </div>
                        <div>
                            @if(\Illuminate\Support\Facades\File::exists('storage/company/'.$company->logo))
                                <img src="{{asset('storage/company/'.$company->logo)}}" alt="">
                            @endif
                            @if(!\Illuminate\Support\Facades\File::exists('storage/company/'.$company->logo))
                                <img src="{{$company->logo}}" alt="">
                            @endif
                        </div>
                        <hr class="mt-4 mb-4">
                        <ul>
                            <h3 style="border-bottom: 2px dotted #888">Employees list</h3>
                            @foreach($company->employees as $employee)
                                <li>{{$employee->email}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
