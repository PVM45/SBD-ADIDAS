@extends('dashboard')

@section('frontend_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('userdashboard_content')

    <div class="table-responsive">
        <table id="myOrder" class="table table-hover table-bordered display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Invoice No</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesanans as $pesanan)
                <tr>
                    <td scope="row">{{ $loop->index+1 }}</td>
                    <td>{{ $pesanan->tanggal_transaksi }}</td>
                    <td>{{ $pesanan->kode_pembayaran }}</td>
                    <td>{{ $pesanan->total_pembayaran }}</td>
                    <td>{{ $pesanan->pembayaran->metode_pembayaran }}</td>
                    <td>
                        @if ($pesanan->status_pesanan == 'belum_terkonfirmasi')
                        <span class="badge badge-primary">{{ $pesanan->status_pesanan }}</span>
                        @else
                        <span class="badge badge-danger">{{ $pesanan->status_pesanan }}</span>
                        @endif
                    </td>
                    <td>
                        {{-- <a href="{{ route('order-deatils', $pesanan->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-eye"></i>View
                        </a>
                        <a href="{{ route('invoice-download', $pesanan->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-download"></i>Invoice</a> --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No order placed yet!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

@section('frontend_script')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myOrder').DataTable();
} );
</script>
@endsection
