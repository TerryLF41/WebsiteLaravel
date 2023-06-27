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
                                {{-- <div class="mt-4">
                                    <x-input-label for="tahun_ajar" :value="__('Tahun Ajaran')" />
                                    <select name="tahun_ajar" id="tahun_ajar" class="mt-1 block w-80">
                                        <option value="{{ false }}">Ganjil</option>
                                        <option value="{{ true }}">Genap</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('tahun_ajar')" class="mt-2" />
                                </div> --}}
                                <br>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                        <th>Kode Program Studi</th>
                                    </tr>
                                    @foreach ($matkuls as $key => $matkul)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $matkul->nama_matkul }}</td>
                                            <td>{{ $matkul->sks }}</td>
                                            <td>{{ $matkul->semester }}</td>
                                            <td>{{ $matkul->program_studi_kode_jurusan }}</td>
                                            <td>
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