@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-left: -200px; margin-right:-200px ">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header text-center" ><h1>Bienvenu sur OPS-PROFESSIONNAL</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                     <div class="container-fluid text-center" >  

                     
      
            
            <div class="row content">
                <div class="col-sm-4 sidenav">
                <p><a href="{{ route('renseigner') }}" style='color:white'>j'ai déjà effectué une formation</a></p>
                    <p><a href="{{ route('liste') }}" style='color:white'>S'inscrire à une formation</a></p>
                    <p><a href="{{route('Profil')}}" style='color:white'>Consulter son profil</a></p>
                    <p><a href="{{ route('liste2') }}" style='color:white'>Liste des appels d'offres</a></p>
                    <p><a href="{{route('pratique')}}" style='color:white'>Test de mise à niveau</a></p>
                    <p><a href="{{route('update')}}" style='color:white'>liste de vos formations</a></p>
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
