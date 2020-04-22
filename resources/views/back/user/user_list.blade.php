@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sidebar</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Kelola User</h2>
            <p class="section-lead">
                Menu untuk kelola user
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-11">
                                <h4>User List</h4>
                            </div>
                            <div class="col-1">
                                {{-- <a href="{{ $url_create }}" class="btn btn-primary">Create New</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Foto Profil</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp

                                        @foreach ($user as $row)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                <div class="gallery">
                                                    <div class="gallery-item"
                                                        data-image="{{ URL::asset('user-images/' . $row->profile_pic) }}"
                                                        data-title="{{ $row->profile_pic }}"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ $url_show }}/{{ $row->id }}"
                                                    class="btn btn-primary">PILIH</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection