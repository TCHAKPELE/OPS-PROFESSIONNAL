@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-left: -400px; margin-right:-400px ">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header text-center" ><h1>Liste des appels d'offres disponibles</h1></div>

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

 @if($request->session()->has('message'))
                     <div class="alert alert-danger">
                     <h2 >Alert</h2>
                     {{$request->session()->get('message')}}
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

