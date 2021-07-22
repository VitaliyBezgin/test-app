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
                        <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Company name</label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="">Company email</label>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="">Company logo</label>
                                @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Company website</label>
                                @error('website')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="url" name="website" class="form-control @error('website') is-invalid @enderror">
                            </div>
                            <input type="submit" value="Save" class="btn btn-success mt-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
