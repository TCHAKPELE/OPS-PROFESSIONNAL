@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-left: -200px; margin-right:-200px ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center"> @if($request->session()->has('msg'))
                     <div class="alert alert-success">
                     <h2 >Alert</h2>
                     {{$request->session()->get('msg')}}
                     </div>
                     @endif

                      @if($request->session()->has('msg2'))
                     <div class="alert alert-danger">
                     <h2 >Alert</h2>
                     {{$request->session()->get('msg2')}}
                     </div>
                     @endif</div>  

                <div class="card-body">
                    <form method="POST" action="{{route('confirm')}}">
                        @csrf
                                                        @foreach($choix as $project )

                                 <input value="{{$project->num_offre}}" name="num" hidden >

                                @endforeach


                        <div class="form-group row">
                            <label for="nom_entreprise" class="col-md-4 col-form-label text-md-right">{{__('Lieu d affectation')}}</label>

                            <div class="col-md-6">
                                <select id="nom_entreprise" type="text" class="form-control mb-2 mr-sm-2" name="lieu" value="{{ old('nom_entreprise') }}" >
                                <option value="0"> </option>
                                @foreach($choix as $project )

                                 <option value="{{$project->num_zone}}">{{$project->nom_zone}} : {{$project->nbr_ops}} places disponibles </option>

                                @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
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
