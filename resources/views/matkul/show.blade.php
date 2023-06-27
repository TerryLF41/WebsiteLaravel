<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Show Role') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">{{ $role->name }}</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a class="btn btn-success" href="{{ route('roles.index') }}">
                                        Back</a>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <span>{{ $role->name }}</span>
                                    </div>
                                    <div class="form-group">
                                        <strong>Permission:</strong>
                                        @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $v)
                                                <span
                                                    class="inline-block px-2 py-1 rounded bg-green-500 mr-1 mb-1 text-white">{{ $v->name }}</span>
                                            @endforeach
                                        @endif
                                    </div>
<<<<<<< Updated upstream
=======
                                    <div class="form-group">
                                        <strong>Kode Program Studi:</strong>
                                        <span>{{ $matkul->program_studi_kode_jurusan }}</span>
                                    </div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Hari</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        @foreach ($mk_Tawars as $key => $matkul)
                                            <tr>
                                                <td>{{ $matkul->jamMulai }}</td>
                                                <td>{{ $matkul->jamSelesai }}</td>
                                                <td>{{ $matkul->hari }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        {{-- <a class="btn btn-info"
                                                            href="{{ route('schedules.show', $matkul->kode_matkul) }}">Show</a> --}}
                                                        {{-- @can('role-edit') --}}
                                                        {{-- <a class="btn btn-primary"
                                                            href="{{ route('schedules.edit', $matkul->kode_matkul) }}">Edit</a> --}}
                                                        {{-- @endcan --}}
                                                        {{-- @can('role-delete') --}}
                                                        {{-- <form method="POST"
                                                            action="{{ route('schedules.destroy', $matkul->kode_matkul) }}"
                                                            style="display:inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" value="Delete"
                                                                class="btn btn-block btn-outline-danger">
                                                        </form> --}}
                                                        {{-- @endcan --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
>>>>>>> Stashed changes
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
