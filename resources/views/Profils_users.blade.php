@extends('layouts.app')
@section('content')
<div class="container emp-profile">
            <form method="POST" action="{{route('change_photo')}}"  >
             @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src= "{{$lien}}"  alt=""/>
                            <div class="alert alert-success">
                               
                                <input type="file" name="file"/>
                               
                       
                                <button type="submit" class="btn btn-primary">
                                    {{ __(' Changer la Photo') }}
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{ Auth::user()->name }} {{ Auth::user()->firstname }}
                                    </h5>
                                    <h6>
                                         
                     <div class="alert alert-dark" align="center">
                     <h2 ></h2>
                     {{$titre}}
                     </div>
                     
                                    </h6>
                                    <p class="proile-rating">Classement : <span>{{$place}}/{{$nbr_ops}}</span></p>
                                    <p class="proile-rating">Date : <span>{{$date}}</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">A propos de vous</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Resultat du concours OPS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Menu</p>
                            <a href="{{ route('renseigner') }}">j'ai déjà effectué une formation</a><br/>
                            <a href="{{ route('liste') }}">S'inscrire à une formation</a><br/>
                            <a href="{{ route('liste2') }}">Liste des appels d'offres</a><br/>
                            <a href="{{route('pratique')}}">Test de mise à niveau</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Numero OPS</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                 @if (Auth::user()->Num_ops==null)
                               Aucun

                            @endif
                              @if (Auth::user()->Num_ops<>null)
                               {{Auth::user()->Num_ops}}

                            @endif

                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telephone :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->tel }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Statut Concours :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> @if (Auth::user()->inscription==0)
                               Pas encore passé
                            @endif
                             @if (Auth::user()->inscription==1)
                               Déjà Inscrit
                            @endif

                            </p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Resultat Test théorique :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> @if (Auth::user()->inscription==0)
                               Aucun
                            @endif
                             @if (Auth::user()->inscription==1)
                               {{$note1}}  /20
                            @endif
                             

                            </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Résultat test pratique :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>@if (Auth::user()->inscription==0)
                               Aucun
                            @endif
                             @if (Auth::user()->inscription==1)
                               {{$note2}}  /20
                            @endif</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Résultat général :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>@if (Auth::user()->inscription==0)
                               Aucun
                            @endif
                             @if (Auth::user()->inscription==1)
                               {{$moyenne}}  /20
                            @endif</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Statut :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                             @if ($moyenne>12)
                               Reussi
                            @endif

                            @if ($moyenne < 12)
                               Ajourné
                            @endif</p>
                                            </div>
                                        </div>
                                       
                               
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
@endsection
