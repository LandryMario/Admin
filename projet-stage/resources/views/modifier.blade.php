<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( "Formulaire de Modifier des utilisateurs!") }}
        </h2>
    </x-slot>
    
   
<div class="py-0">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 text-gray-900">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                
                    <form action="/modifier" method="Post">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
        @csrf
                        
        <label for="immatricule">Immatricule:</label>
          <input type="text" name="immatricule" class="form-control form-control-lg rounded-md text-sm" placeholder="Immatricule:"  value="{{$user->immatricule}}"required /><br>

        <label for="name">Name:</label>
          <input type="text" name="nom" class="form-control form-control-lg rounded-md text-sm" placeholder="Nom:"  value="{{$user->name}}"required /><br>
          
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control form-control-lg rounded-md text-sm" placeholder="Address Email:"  value="{{$user->email}}" required /><br>

          <label for="Cour_appel">Cour d'appel:</label>
          <input type="text" name="Cour_appel" class="form-control form-control-lg rounded-md text-sm" placeholder="Cour d'Appel:"  value="{{$user->Cour_appel}}" required /><br>

          <label for="TPI">Tribunal:</label>
          <input type="text" name="TPI" class="form-control form-control-lg rounded-md text-sm" placeholder="Tribunal:"  value="{{$user->TPI}}" required /><br>

          <label for="password">Password haché:</label>
          <input type="password" name="password" class="form-control form-control-lg rounded-md text-sm" placeholder="Mot de passe:"  value="{{$user->password}}" required /><br>
         
          <button type="submit" class="btn btn-success text-sm" value="">Modifier</button>
          
        </form>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
