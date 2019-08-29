@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-left: -400px; margin-right:-400px ">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header text-center" ><h1>Liste des appels d'offres Cloturés
                @if($request->session()->has('msg'))
                     <div class="alert alert-success" align="center">
                     <h2 >Attention</h2>
                     {{$request->session()->get('msg')}}
                     </div>
                     @endif
               
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

 
                      
<tr>
<p style="color:white" hidden>id</p>
<th><p style="color:black" align="center">Nom_Entreprise</p></th>
<th><p style="color:black"  align="center">Rénumération</p></th>
<th><p style="color:black"  align="center">Contact</p></th>
<th><p style="color:black"  align="center">Email</p></th>
<th><p style="color:black"  align="center">Date_debut</p></th>
<th><p style="color:black"  align="center">Date_fin</p></th>



</tr>


 
<form class="form-group" role="form-group"  method="POST" action="">
            @csrf
           
            @foreach($Appels as $project )
             <tr>
<input type="text" readonly value="{{$project->	id}}" hidden style="color:black"  name="id_project"class="form-control mb-4 mr-sm-4">
<th><input type="text" readonly value="{{$project->nom_entreprise}}" style="color:black"   name="nom_entreprise"class="form-control mb-4 mr-sm-4"></th>
<th><input type="number" readonly value="{{$project->renumeration}}" style="color:black"  name="salaire" class="form-control mb-2 mr-sm-2"></th>
 
         <th><input type="number"  style="color:black"  readonly value="{{$project->tel}}" name="tel" class="form-control mb-2 mr-sm-2"></th>
         <th><input type="text"  style="color:black"  readonly value="{{$project->email}}"  name="email" class="form-control mb-4 mr-sm-4"></th>
         <th><input type="text"  style="color:black"  readonly value="{{$project->Date_debut}}"  name="Date_debut" class="form-control mb-4 mr-sm-4"></th>
         <th><input type="text"  style="color:black"  readonly value="{{$project->Date_fin}}"  name="Date_fin" class="form-control mb-4 mr-sm-4"></th> 
             

<th><a  href="{{route('Impression_OPS',['value'=>$project->id])}}" class="btn btn-lg btn-success btn-block " onclick="return window.confirm('voulez-vous consulter la liste des OPS admis pour ce projet ?')" > Consulter </a></th>
<th><a  href="{{route('Impression_OPS2',['value'=>$project->id])}}" class="btn btn-lg btn-success btn-block " onclick="return window.confirm('voulez-vous consulter la liste d_attente des OPS  pour ce projet ?')" > Liste_d'attente </a></th>



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

