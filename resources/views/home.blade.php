@extends('template.master')

@section('main')

            <div class="my-4">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  你登入了!
                </div>
            </div>
 
@endsection
