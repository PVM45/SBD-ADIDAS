<!-- frontend/profile/address.blade.php -->

<h1>Daftar Alamat</h1>

@if($alamat->isEmpty())
    <p>Tidak ada alamat yang tersedia.</p>
@else
    <ul>
        @foreach($alamat as $alamats)
            <li>
                <strong>Alamat:</strong> {{ $alamats->alamat }} <br>
            </li>
            <br>
        @endforeach
        <h2>TAMBAHKAN ALAMAT</h2>
        <form action=" {{ route('author.user.address.process') }} " method="post">
            <label for="Alamat">Masukkan Alamat Anda</label>
            <input type="text" name="Alamat">
            <button type="submit">Submit</button>
        @csrf
    </form>
    </ul>
@endif
