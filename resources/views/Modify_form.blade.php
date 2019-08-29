@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">Modifier les informations
 
</div>

                <div class="card-body">
                    <form method="POST" action="{{route('update_form')}}">
                        @csrf



                         <div class="form-group row">
                        
                        <label for="nom2" class="col-md-4 col-form-label text-md-right">{{ __('Nom_Institut') }}</label>
                        <div class="col-md-6">
                          <input id="nom2" type="text"   class="form-control @error('nom2') is-invalid @enderror" name="nom2" placeholder="{{ $nom2}}" >

                          </div>
                          </div>

                       <div class="form-group row">
                        
                        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom_formation') }}</label>
                        <div class="col-md-6">
                          <input id="nom" type="text"   class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="{{ $nom}}" >

                          </div>
                          </div>


                           <div class="form-group row">
                        
                        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Email_institut') }}</label>
                        <div class="col-md-6">
                        <input id="email" type="email"   class="form-control @error('nom') is-invalid @enderror" name="email" placeholder="{{ $email}}" >

                          </div>
                          </div>


                           <div class="form-group row">
                        
                        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Tel_Institut') }}</label>
                        <div class="col-md-6">
                        <input id="email" type="number"   class="form-control @error('nom') is-invalid @enderror" name="tel" placeholder="{{ $tel}}" >

                          </div>
                          </div>







                         <input id="id" type="number"  hidden class="form-control @error('nom') is-invalid @enderror" name="id" value="{{ $id}}" >

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Date début') }}</label>

                            <div class="col-md-6">
                                <input id="score_théorique" type="date" class="form-control @error('score_théorique') is-invalid @enderror" name="Date_debut" value="{{ old('Date_debut') }}" >

                                @error('score_théorique')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="score_pratique" class="col-md-4 col-form-label text-md-right">{{ __('Date_fin') }}</label>

                            <div class="col-md-6">
                                <input id="Date_fin" type="date" class="form-control @error('Date_fin') is-invalid @enderror" name="Date_fin" >

                                @error('score_pratique')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                   

                                  
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier') }}
                                </button>
                                
                               
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
