{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.master')

@section('title', 'Doctors')

@section('content')

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fas fa-user-md"></i> Doctors<a href="{{ route('doctors.create') }}" class="btn btn-success pull-right">Add Doctor</a>
    </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                    <a href="doctors_edit/{{ $user->id }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['doctors.destroy', $user->id] ]) !!}
                    {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

   

</div>

@endsection