<x-app-layout>

    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            
            <div class="w-2/4 sm:max-w-2xl p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h1 class="text-2xl uppercase text-center mb-0.5">Crear Usuario</h1>
                <form action="{{ route('users.store') }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control">
                        @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="email">Correo</label>
                        <input type="email" id="email" name="email" class="form-control">
                        @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="image">Imagen</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @error('image') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn bg-green-600 hover:bg-green-500 mt-4 w-full">Guardar</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>