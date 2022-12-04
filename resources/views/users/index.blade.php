<x-app-layout>

    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h1 class="title1">Listado de Usuarios</h1>
                <div>
                    <a class="btn btn-secondary" href="{{ route('users.create') }}">
                        Crear Usuario
                    </a>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="align-middle">
                            <td>{{ $user->id }}</td>
                            <td>
                                @empty(!$user->photo)
                                    <img src="{{$user->photo_url}}" class="m-0 inline-block" width="20"">
                                @endempty
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('users.show',$user)}}">Ver</a>
                                <a class="btn btn-info" href="{{ route('users.edit',$user)}}">Editar</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" class="inline-block" onclick="return confirm('Estas seguro de elminar el recurso')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn bg-red-600 hover:bg-red-500" >Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>