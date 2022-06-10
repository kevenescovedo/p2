<h3>Editar Usuário<h3>
 <form action="{{route('usuarios.update', $usuario['id'])}}" method='POST'>
     @csrf
     <!-- para poder mandar um formulário com requisisção put -->
     @method('PUT')
     <input type='text' name="login" value ="{{ $usuario['login'] }}"></input>
     <input type="submit" value = 'salvar'></input>
 </form>
