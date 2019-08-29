@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-left: -400px; margin-right:-400px ">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header text-center" ><h1>Liste des Candidats pour le concours OPS
               
                </h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="margin-left: 0px; margin-right:0px ">
<table border="1px" align="center" class='table table-bordered  table-striped table-responsive-xl' id="tab" >
<body>
 @if($request->session()->has('msg'))
                     <div class="alert alert-danger" align="center">
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




</tr>

   @foreach($liste_candidats as $OPS )
 
<form class="form-group" role="form-group"  method="POST" action="" >
            @csrf
                
         
  
  <tr>
<th><input type="text" readonly value="{{$OPS->name}}" style="color:black"   name="nom" class="form-control mb-4 mr-sm-4"></th>
<th><input type="text" readonly value="{{$OPS->firstname}}" style="color:black"  name="prenom" class="form-control mb-2 mr-sm-2"></th>
 
         <th><input type="number"  style="color:black"  readonly value="{{$OPS->tel}}" name="tel" class="form-control mb-2 mr-sm-2"></th>
         <th><input type="text"  style="color:black"  readonly value="{{$OPS->email}}"  name="email" class="form-control mb-4 mr-sm-4"></th>

             



</tr>


@endforeach

</form>


</body>

</table>

<div align="center">

 <p id="Imprimer le rapport "> <input  type="button" class="btn btn-primary mb-2" value="Imprimer la liste des candidats " onClick="window.print();" ></p>


                        
                        </div>
        </div>
                    
                    
            </div>
        </div>
    </div>
</div>
@endsection

