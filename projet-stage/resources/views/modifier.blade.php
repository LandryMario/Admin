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
        @csrf
          <input type="text" name="id" class="form-control form-control-lg rounded-md text-sm" placeholder="identification:" value="{{$user->id}}" required /><br>
          <input type="text" name="im" class="form-control form-control-lg rounded-md text-sm" placeholder="Immatriculation:"  value="{{$user->immatriculation}}"required /><br>
          <input type="text" name="nom" class="form-control form-control-lg rounded-md text-sm" placeholder="Nom:"  value="{{$user->nom}}"required /><br>
          <input type="text" name="prenom" class="form-control form-control-lg rounded-md text-sm" placeholder="Prénom:"  value="{{$user->prenom}}"required /><br>
          <input type="email" name="mail" class="form-control form-control-lg rounded-md text-sm" placeholder="Address Email:"  value="{{$user->email}}" required /><br>
          <input type="text" name="appel" class="form-control form-control-lg rounded-md text-sm" placeholder="Cour d'Appel:"  value="{{$user->appel}}" required /><br>
          <input type="text" name="tpi" class="form-control form-control-lg rounded-md text-sm" placeholder="Tribunal:"  value="{{$user->tribunal}}" required /><br>
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control form-control-lg rounded-md text-sm" required>
            <option value="1" >1</option>
            <option value="0" >0</option>
            </select><br>
          <input type="password" name="mdp" class="form-control form-control-lg rounded-md text-sm" placeholder="Mot de passe:"  value="{{$user->password}}" required /><br>
         
          <button type="submit" class="btn btn-success text-sm" value="">Modifier</button>
          
        </form>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
