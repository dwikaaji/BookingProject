@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Booking Ice Skating</h1>
    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid" style="width: 700px; height: 450px;" src="{{ url('images/icekatings.jpg') }}" alt="">
        </div>

        <div class="col-md-4">
            <h3 class="my-3">Brand Description</h3>
            <p>Sky Rink merupakan tempat rekreasi bagi anak-anak maupun orang dewasa,
                tempat ini sangatlah popular di Jakarta karena hanya ada di beberapa wilayah dan mall yang
                menyediakan tempat bermain ini,karena hanya di beberapa wilayah saja,membuat tempat ini sangat ramai
                untuk dikunjungi,dan akan meningkat ketika musim liburan datang.Karena terlalu padatnya pengunjung,membuat kita
                yang sudah sampai di tempat tersebut,kehabisan tempat atau sudah penuh,yang membuat harus menunggu lama
            </p>

            <p>
                Maka dari itu, dibutuhkan suatu aplikasi yang membuat pelanggan dapat melakukan pemesanan secara cepat
                tanpa harus datang ke tempatnya.Hal ini terutama akan sangat membantu pengunjung dalam memesan tempat
                agar ketika sudah sampai di tempat tidak perlu khawatir akan tempat sudah penuh dan menunggu lama lagi.
            </p>
            <p>
                Dengan website ini,kita dapat dengan mudah memesan dengan online kapan kita akan bermain ice kating.
            </p>
            <a href="{{ url('/booking') }}" class="btn btn-primary">Book Now!</a>
        </div>
    </div>
</div>

@endsection
