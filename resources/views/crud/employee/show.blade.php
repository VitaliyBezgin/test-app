<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($employee->full_name) }}
        </h2>
    </x-slot>

    <div class="action mt-4 mb-4 d-flex justify-content-end">
        <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-warning  mr-3">Edit</a>
        <form action="{{route('employee.destroy', $employee->id)}}" method="POST">
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
                      <ul>
                          <li>{{$employee->full_name}}</li>
                          <li>{{$employee->email}}</li>
                          <li>{{$employee->phone}}</li>
                          <hr class="mt-2 mb-2">
                          <li>work in -> {{ $employee->company->name}}</li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
