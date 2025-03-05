@include('front.layout.stylesheet')
@include('front.layout.navbar')

@include('front.layout.headrenja',['title' => 'renja 2020-2023'])
<!-- Container -->
<div class="container2" style="padding-top: 0px">
    <section class="document-section2">

        <div class="document-item2">
            @foreach($aset as $index => $item)
            <tr data-tahun="{{ $item->year }}" data-judul="{{ $item->title }}">
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->title }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="iframe-container text-center">
                        <iframe src="https://docs.google.com/gview?url={{ urlencode($item->pdf) }}&embedded=true" width="100%" height="500" allow="autoplay"></iframe>
                    </div>
                </td>
            </tr>
            @endforeach
        </div>
    </section>
</div>


@include('front.layout.footer')
@include('front.layout.scripts')