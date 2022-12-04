<x-app-layout>

    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h1>Detalle de Usuario</h1>
                <b>Nombre:</b> {{ $user->name}}<br>
                <b>Correo:</b> {{ $user->email}}
                <img src="{{ $user->photo_url }}" title="{{$user->photo}}">
            </div>
        </div>
    </div>

</x-app-layout>