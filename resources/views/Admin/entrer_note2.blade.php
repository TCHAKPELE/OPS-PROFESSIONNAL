@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">{{ $nom}} {{$prenom}}
 
</div>

                <div class="card-body">
                    <form method="POST" action="{{route('modify_note')}}">
                        @csrf
                       
                       
                        
                         
                         <input id="email" type="email"  hidden class="form-control @error('nom') is-invalid @enderror" name="email" value="{{ $email}}" >
                         <input id="id" type="number"  hidden class="form-control @error('nom') is-invalid @enderror" name="id" value="{{ $id}}" >

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('score_théorique') }}</label>

                            <div class="col-md-6">
                                <input id="score_théorique" type="number" class="form-control @error('score_théorique') is-invalid @enderror" name="score_théorique" value="{{ old('score_théorique') }}" >

                                @error('score_théorique')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="score_pratique" class="col-md-4 col-form-label text-md-right">{{ __('score_pratique') }}</label>

                            <div class="col-md-6">
                                <input id="score_pratique" type="number" class="form-control @error('score_pratique') is-invalid @enderror" name="score_pratique" >

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
