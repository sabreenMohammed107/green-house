<div class="row">
    @foreach ($partners as $partner)
    <div class="col-md-4">
        <div class="practice">
            <img src="{{ asset('uploads/partners') }}/{{ $partner->logo ?? '' }}" />
            <div class="info">
                <h3><a href="#"> {!! $partner->name ?? '' !!}</a></h3>
                <p> {!! $partner->description ?? '' !!}</p>
            </div>
        </div>
    </div>
    @endforeach


</div>
<div class="row mt-5">
    <div class="row justify-content-center mt-5" style="margin: auto">
        <div class="block-27" >
            <ul class="pagination">
                <li><a href="#">&lt;</a></li>
                @for ($i = 1; $i <= $partners->lastPage(); $i++)
                <!-- a Tag for another page -->
                <li class="{{ $partners->currentPage() == $i ? ' active' : '' }}"> <a
                        href="{{ $partners->url($i) }}" >{{ $i }}</a></li>
            @endfor


                <li><a href="#">&gt;</a></li>
            </ul>
        </div>
    </div>
</div>
