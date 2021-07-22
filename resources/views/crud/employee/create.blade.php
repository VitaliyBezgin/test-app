<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies list ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('error'))
            <p class="alert alert-danger">{{session('error')}}</p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Employee first name</label>
                                @error('firstName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="">Employee last name</label>
                                @error('lastName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="">Employee email</label>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="">Employee phone</label>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" accept="image/*">
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Companies</label>
                                @error('company_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select name="company_id" id="" class="form-control">
                                    <option value="None" disabled selected>-----</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" value="Save" class="btn btn-success mt-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
