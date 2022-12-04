<x-app-layout>

    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            
            <div class="w-2/4 sm:max-w-2xl p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h1 class="text-2xl uppercase text-center mb-0.5">Editar Usuario</h1>
                <form action="{{ route('users.update', $user->id) }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                        @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="email">Correo</label>
                        <input type="email" id="email" name="email" class="form-control"  value="{{$user->email}}">
                        @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="image">Imagen</label>
                        @if(empty($user->photo))
                            <span class="block p-1 w-full rounded border-2 border-orange-400 bg-orange-200 text-center">Usuario sin foto de perfil</span>
                        @else
                            <img src="{{ $user->photo_url }}" title="{{$user->photo}}" class="m-0 inline-block">
                        @endif
                    </div>

                    <input type="file" id="image" name="image" class="form-control">
                    @error('image') <span class="text-red-600">{{ $message }}</span> @enderror

                    <button type="submit" class="btn bg-green-600 hover:bg-green-500 mt-4 w-full">Actualizar</button>
                    <a href="{{ route('users.index') }}" class="no-underline rounded text-white font-bold btn-secondary py-0 px-4 text-center w-full block mt-2">Volver</a>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>