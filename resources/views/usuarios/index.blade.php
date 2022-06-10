<h1>Usuários:</h1> | <a href="{{route('usuarios.create')}}">Novo Usuários</a>
<ol>
    @foreach ($usuarios as $u)
    <li>{{$u['login']}} |
    <a href="{{route('usuarios.edit', $u['id'])}}">Editar</a>
    <a href="{{route('usuarios.show', $u['id'])}}">Informações</a>
    <form action="{{route('usuarios.destroy', $u['id'])}}" method='POST'>
     @csrf
     <!-- para poder mandar um formulário com requisisção delete -->
     @method('DELETE')
     <input type="submit" value = 'Apagar'></input>
    </li>
    @endforeach
</ol>
