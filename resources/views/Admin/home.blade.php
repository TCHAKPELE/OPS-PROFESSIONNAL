@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-left: -200px; margin-right:-200px ">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header text-center" ><h1>Menu Administrateur</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                     <div class="container-fluid text-center" >  

                     
      
            
            <div class="row content">
                <div class="col-sm-4 sidenav">
                <p><a href="{{ route('ajout') }}" style='color:white'>Ajouter une formation</a></p>
                    <p><a href="{{route('affichage_offre')}}" style='color:white'>Liste des appels d'offres</a></p>
                    <p><a href="{{route('Appel_doffre_cloturé')}}" style='color:white'>Consulter la liste des OPS Par appel d offre </a></p>
                    <p><a href="{{route('affichage_candidat')}}" style='color:white'>Entrer les Resultats du concours OPS</a></p>
                    <p><a href="{{route('ajout_exam')}}" style='color:white'>Programmer un concours OPS ou un test de mise à niveau</a></p>
                    <p><a href="{{route('update_note')}}" style='color:white'>Consulter la liste Des candidats </a></p>
                    <p><a href="{{route('accept')}}" style='color:white'>Consulter la liste des demandes d'adhesion </a></p>
                </div>
                <div class="col-sm-8 text-left"> 
                    </br>
                    
                    <p align="center">
                    <img src="" />
                   </p>
                    </br>
                    @if($request->session()->has('Indication'))
                     <div class="alert alert-success">
                     <h2 >Alert</h2>
                     {{$request->session()->get('Indication')}}
                     </div>
                     @endif

                      @if($request->session()->has('msg2'))
                     <div class="alert alert-success">
                     <h2 >Alert</h2>
                     {{$request->session()->get('msg2')}}
                     </div>
                     @endif

                     
                    <h1 style='color:black'>A propos de OPS-PROFESSIONNAL</h1>
                    </br>
                    <p style='color:black' >Cette plateforme entièrement dédié aux personnes attirées par l'outils informatique vous permetrra à la fois de vous former en tant qu'opérateur de saisi et de vous fournir de l'emploi de façon régulier via des appels d'offres si vous respecter les critères de sélection.Des test de mise à niveau vous seront également proposé à interval regulier afin de maintenir votre niveau.cordialement l'administration</p>
                    <hr>
                    
                   
                    <div class='dropdown' >
                       
                        <div class="dropdown-menu">
                           
                        </div>
                    </div>
                </div>
                <div class="col-sm-4  sidenav">
                    <div class="well">
                        <img  width="250px" src="" alt=""/>
                    </div>
                    </br>
                    <div class="well">
                        <p style='color:black'></p>
                    </div>
                </div>
            </div>

        </div>

        <footer class="container-fluid text-center">
            
        </footer>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
