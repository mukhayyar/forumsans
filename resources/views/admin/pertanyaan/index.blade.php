@extends('layouts.admin')

@push('style')
<link rel="stylesheet" href="/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css">
@endpush
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pertanyaan Dashboard</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pertanyaan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Pertanyaan</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
    </div>
</div>


@endsection
@push('scripts')
<script src="/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.dashboard.pertanyaan.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'user.username', name: 'username'},
              {data: 'user.email', name: 'email'},
              {data: 'judul', name: 'judul'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });
</script>
@endpush
