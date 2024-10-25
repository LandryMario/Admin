<x-app-layout>
<div class="py-0">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 text-gray-900">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                
                    <form action="{{ route('modification') }}" method="POST">
                      @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                      @endif
                      
                      @if (session('error'))
                          <div class="alert alert-danger">
                              {{ session('error') }}
                          </div>
                      @endif
                      @csrf 

                      
                      <label for="immatricule">Immatricule:</label>
                      <input type="text" name="immatricule" class="form-control form-control-lg rounded-md text-sm border-gray-300 "  value="{{$user->immatricule}}"/><br>
                      <input type="hidden" name="id" value="{{ $user->id }}" />
                      
                        <label for="name">Nom:</label>
                        <input type="text" name="name" class="form-control form-control-lg rounded-md text-sm border-gray-300" value="{{$user->name}}"/><br>
                        
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control form-control-lg rounded-md text-sm border-gray-300" value="{{$user->email}}"/><br>
                      
                        <button type="submit" class="btn btn-success text-sm">Modifier</button>
                        
                      </form>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
