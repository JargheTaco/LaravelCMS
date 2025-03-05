@include('front.layout.assets')
@include('front.layout.navbar')
@include('front.layout.headproduk',['title' => 'Standar Operasional Prosedur'])
    
<div class="container2" style="padding-top: 0px">
    @foreach($tahunanggaran as $item)
    <section class="document-section2">

        <div class="document-item2">
            <h4>{{$item->title}}</h4>
            <p>{{$item->year}}</p>
            <tr>
                <td colspan="2">
                    <div class="iframe-container text-center">
                        <iframe src="https://docs.google.com/gview?url={{ urlencode($item->pdf) }}&embedded=true" width="100%" height="500" allow="autoplay"></iframe>
                    </div>
                </td>
            </tr>
        </div>
    </section>
    @endforeach
</div>



@include('front.layout.footer')
@include('front.layout.scripts')