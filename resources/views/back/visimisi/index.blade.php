@extends('back.layout.template')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css
">
@endpush

@section('title', 'List Visi Misi - Admin')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Visi Misi</h1>

    </div>

    <div class="mt-3">
        <a href="{{ url('visimisi/create') }}" class="btn btn-success mb-2">Create</a>
        @if ($errors->any())
        <div class="my-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="swal" data-swal="{{ session('success') }}"></div>


        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Publish date</th>
                    <th>Function</th>
                </tr>
            </thead>

            <tbody>

            </tbody>
        </table>
    </div>
    @endsection

    @push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        const swal = $('.swal').data('swal');
        if (swal) {
            Swal.fire({
                'title': 'Success',
                'text': swal,
                'icon': 'success',
                'showConfirmButton': false,
                'timer': 2000
            });
        }

        function deleteVisiMisi(e) {
            let id = $(e).data('id');

            Swal.fire({
                title: 'Delete this Visi Misi?',
                text: "Are you sure you want to delete?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: '/visimisi/' + id,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                            }).then((result) => {
                                window.location.href = '/visimisi';
                            });      
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                }
            });
        }
    </script>

    {{-- Data table --}}
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}'.replace('http://', 'https://'),
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'desc',
                        name: 'desc'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    }
                ]
            });
        });
    </script>
    @endpush