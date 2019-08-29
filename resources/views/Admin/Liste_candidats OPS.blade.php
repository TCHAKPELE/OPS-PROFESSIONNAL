@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-left: -400px; margin-right:-400px ">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header text-center" ><h1>Liste des candidats au concours OPS 
               
                </h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="margin-left: 0px; margin-right:0px ">
<table border="1px" align="center" class='table table-bordered  table-striped table-responsive-xl'>
<body>
 @if($request->session()->has('msg'))
                     <div class="alert alert-dark" align="center">
                     <h2 >Attention</h2>
                     {{$request->session()->get('msg')}}
                     </div>
                     @endif
                      @if($request->session()->has('msg2'))
                     <div class="alert alert-danger" align="center">
                     <h2 >Attention</h2>
                     {{$request->session()->get('msg2')}}
                     </div>
                     @endif
<tr>

<p style="color:black" align="center" hidden>id</p>
<th><p style="color:black"  align="center">Nom_candidat</p></th>
<th><p style="color:black"  align="center">Prenom</p></th>
<th><p style="color:black"  align="center">Contact</p></th>
<th><p style="color:black"  align="center">Email</p></th>
<th><p style="color:black"  align="center">Nom_concours</p></th>




</tr>


 
<form class="form-group" role="form-group"  method="POST" action="" >
            @csrf
                
            @foreach($candidats as $project )
  <input type="text" readonly value="{{$project->id}}" hidden style="color:black"  name="id" class="form-control mb-4 mr-sm-4">
  <tr>
<th><input type="text" readonly value="{{$project->name}}" style="color:black"   name="nom"class="form-control mb-4 mr-sm-4"></th>
<th><input type="text" readonly value="{{$project->firstname}}" style="color:black"  name="prenom" class="form-control mb-2 mr-sm-2"></th>
 
         <th><input type="number"  style="color:black"  readonly value="{{$project->tel}}" name="tel" class="form-control mb-2 mr-sm-2"></th>
         <th><input type="text"  style="color:black"  readonly value="{{$project->email}}"  name="email" class="form-control mb-4 mr-sm-4"></th>

         <th><input type="text"  style="color:black"  readonly value="{{$project->nom_formation}}"  name="email" class="form-control mb-4 mr-sm-4"></th>
             

<th><a  href="{{route('insert',['value'=>$project->id])}}" class="btn btn-lg btn-success btn-block " > Inserer note </a></th>

</tr>


@endforeach
</form>


</body>

</table>
        </div>
                    
                    
            </div>
        </div>
    </div>
</div>
@endsection

