<h1>Pilihan Metode Pembayaran</h1>

    <form method="POST" action="{{ route('author.checkout.proses.pembayaran') }}">
        @csrf

        <label>Pilih metode pembayaran:</label>
        <br>

        @foreach ($pembayarans as $pembayaran)
            <label>
                <input type="radio" name="metode_pembayaran" value="{{ $pembayaran->id }}">
                
                {{ $pembayaran->metode_pembayaran }}
            </label>
            <br>
        @endforeach

        {{-- @foreach ($alamat as $alamats) --}}

        {{-- <input type="text" name="alamat" value=" {{ $alamats }} "> --}}
        <p> {{ $alamat->alamat }} </p>
        


        {{-- @endforeach --}}

        <button type="submit">Lanjutkan</button>
    </form>