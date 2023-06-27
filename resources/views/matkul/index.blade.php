<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Matkul Management') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Daftar Matkul</h3>
                            </div>
                            <div class="card-tools">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-white">{{ __('error.') }}</p>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-transition
                                        x-init="setTimeout(() => show = false, 2000)">
                                        <p class="text-sm text-white">{{ __($message) }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div>
                                    {{-- @can('role-create') --}}
                                        <a class="btn btn-success" href="{{ route('matkuls.create') }}">
                                            Create New Matkul</a>
                                    {{-- @endcan --}}
                                </div>
                                <br>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                        <th>Status</th>
                                        <th>Kode Program Studi</th>
                                        <th>Sks</th>
                                        <th>Status</th>
                                        <th>Kode Program Studi</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    @foreach ($matkuls as $key => $matkul)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $matkul->nama_matkul }}</td>
                                            <td>{{ $matkul->sks }}</td>
                                            @if ($matkul->status == 1)
                                                <td>Active</td>
                                            @else
                                                <td>Inactive</td>
                                            @endif
                                            <td>{{ $matkul->program_studi_kode_jurusan }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-info"
                                                        href="{{ route('matkuls.show', $matkul->kode_matkul) }}">Show</a>
                                                    @can('role-edit')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('matkuls.edit', $matkul->kode_matkul) }}">Edit</a>
                                                    @endcan
                                                    @can('role-delete')
                                                        <form method="POST"
                                                            action="{{ route('matkuls.destroy', $matkul->kode_matkul) }}"
                                                            style="display:inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" value="Delete"
                                                                class="btn btn-block btn-outline-danger">
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
