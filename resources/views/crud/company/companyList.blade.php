<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies list ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('company.create')}}" class="btn btn-primary mt-2 mb-4">Create company</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        @foreach($companies as $company)
                            <div class="mt-4 mb-4">
                                <div>
                                    <ul>
                                        <li>
                                            <a href="{{route('company.show', $company->id)}}">{{$company->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
