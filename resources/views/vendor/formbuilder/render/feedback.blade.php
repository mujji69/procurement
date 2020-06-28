@extends('formbuilder::layout')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        Form Successfully submitted

                        
                    </h5>
                </div>

                <div class="card-body">
                    <h3 class="text-center text-success">
                        Your entry for <strong>{{ $form->name }}</strong> was successfully submitted.
                    </h3>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin') }}" class="btn btn-primary">
                        <i class="fa fa-home"></i> Return Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
