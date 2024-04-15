@extends('layout')
@section('content')

<section class="Agents px-4 ">

    <table class="agent table align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>Rendre admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                               {{ $user->name }}
                            </p>
                        </div>
                    </div>
                </td>
                 <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                               {{ $user->email }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="{{ route('users.make-admin', $user->id) }}" onclick="event.preventDefault(); document.getElementById('make-admin-form-{{ $user->id }}').submit();">
                        <i class="fa fa-user-shield text-success"></i> <!-- Assurez-vous de remplacer la classe d'icône par celle appropriée de FontAwesome -->
                    </a>
                    <form id="make-admin-form-{{ $user->id }}" action="{{ route('users.make-admin', $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <div class="d-flex justify-content-end">
            <ul class="pagination">
                {!! $users->links() !!}
            </ul>
        </div>
</section>
@endsection
