<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees list ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('employee.create')}}" class="btn btn-primary mt-2 mb-4">Create employee</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        @foreach($employees as $emp)
                            <div class="mt-4 mb-4">
                                <div>
                                    <a href="{{route('employee.show', $emp->id)}}" class="btn btn-primary">Show more ...</a>
                                    <ul>
                                        <li>{{$emp->full_name}}</li>
                                        <li>{{$emp->email}}</li>
                                        <li>{{$emp->phone}}</li>
                                        <li class="mt-2">
                                            <a href="{{route('company.show', $emp->company->id)}}">
                                                <mark>Work in ->  {{$emp->company->name}}</mark>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
