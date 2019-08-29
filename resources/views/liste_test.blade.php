@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center"  style="margin-left: -200px; margin-right:-200px ">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header text-center"  style="margin-left: 200px; margin-right:200px "><h1>Liste des Tests de mise à niveau disponibles
                </br>
                
                </h1></div>

                <div class="card-body" style="margin-left: 100px; margin-right:100px ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status') }}
                        </div>
                    @endif


                    <div style="margin-left: -100px; margin-right:-100px ">
<table border="1px" align="center" class='table table-bordered  table-striped table-responsive-xl'>
<body>
<tr>
<p style="color:white" hidden>id</p>
<th><p style="color:black" align="center">Nom_institut</p></th>
<th><p style="color:black"  align="center">Nom_test</p></th>
<th><p style="color:black"  align="center">Contact</p></th>
<th><p style="color:black"  align="center">Email</p></th>
<th><p style="color:black"  align="center">Date_debut</p></th>
<th><p style="color:black"  align="center">Date_fin</p></th>



</tr>
 
 <tr>


   @foreach($formations as $formation )

<form  method="POST" action="">
            @csrf
           
          
<input type="text"  value="{{$formation->id_formation}}" hidden style="color:black"  name="id_formation" class="form-control @error('nom') is-invalid @enderror">
<th><input type="text" readonly value="{{$formation->nom_Institut}}" style="color:black"   name="nom1" class="form-control @error('nom1') is-invalid @enderror"></th>
<th><input type="text" readonly value="{{$formation->nom_formation}}" style="color:black"  name="nom2" class="form-control @error('nom2') is-invalid @enderror"></th>
 
         <th><input type="number"  style="color:black"  readonly value="{{$formation->contact}}" name="tel" class="form-control @error('tel') is-invalid @enderror"></th>
         <th><input type="email"  style="color:black"  readonly value="{{$formation->email}}"  name="email" class="form-control @error('email') is-invalid @enderror"></th>
         <th><input type="text"  style="color:black"  readonly value="{{$formation->Date_debut}}"  name="Date_debut" class="form-control @error('Date_debut') is-invalid @enderror"></th>
         <th><input type="text"  style="color:black"  readonly value="{{$formation->Date_fin}}"  name="Date_fin" class="form-control @error('Date_fin') is-invalid @enderror"></th> 
             

<th><a  href="{{route('Register_test',['value'=>$formation->id_formation])}}" class="btn btn-lg btn-success btn-block " onclick="return window.confirm('voulez-vous Participer à cet examen?')" >S'inscrire <a/></th>


</form>
</tr>
@endforeach


@if($request->session()->has('message'))
                     <div class="alert alert-dark" align="center">
                     <h2 ></h2>
                     {{$request->session()->get('message')}}
                     </div>
                     @endif

                     @if($request->session()->has('msg1'))
                     <div class="alert alert-danger" align="center">
                     <h2 ></h2>
                     {{$request->session()->get('msg1')}}
                     </div>
                     @endif

                     @if($request->session()->has('msg2'))
                     <div class="alert alert-success" align="center">
                     <h2 ></h2>
                     {{$request->session()->get('msg2')}}
                     </div>
                     @endif
</body>

</table>
        </div>
                    
                    
            </div>
        </div>
    </div>
</div>
@endsection

