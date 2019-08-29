@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-left: -200px; margin-right:-200px ">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header text-center" ><h1>
                Ajouter une nouvelle formation
                </br>
                
                </h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <div class="card-body">
                      @if($request->session()->has('msg'))
                     <div class="alert alert-success">
                     <h2 ></h2>
                     {{$request->session()->get('msg')}}
                     </div>
                     @endif

                      @if($request->session()->has('msg2'))
                     <div class="alert alert-danger">
                     <h2 >Alert</h2>
                     {{$request->session()->get('msg2')}}
                     </div>
                     @endif
                    <form method="POST" action="{{route('save_formation')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom_Institut" class="col-md-4 col-form-label text-md-right">{{ __('Nom Institut') }}</label>

                            <div class="col-md-6">
                                <input id="nom_Institut" type="text" class="form-control @error('nom_Institut') is-invalid @enderror" name="nom_Institut" value="{{ old('nom_Institut') }}" >

                                @error('nom_Institut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="nom_formation" class="col-md-4 col-form-label text-md-right">{{ __('Nom de la Formation') }}</label>

                            <div class="col-md-6">
                                <input id="nom_formation" type="text" class="form-control @error('nom_formation') is-invalid @enderror" name="nom_formation" value="{{ old('nom_formation') }}" >

                                @error('nom_formation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="number" class="form-control @error('	contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" >

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date_debut') }}</label>

                            <div class="col-md-6">
                                <input id="Date_debut" type="date" class="form-control @error('Date_debut') is-invalid @enderror" name="Date_debut" value="{{ old('Date_debut') }}"  >

                                @error('Date_debut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Date_fin" class="col-md-4 col-form-label text-md-right">{{ __('Date_fin') }}</label>

                            <div class="col-md-6">
                                <input id="Date_fin" type="date" class="form-control @error('Date_fin') is-invalid @enderror" name="Date_fin" required autofocus name="Date_fin">

                                @error('Date_fin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Institut') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
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

