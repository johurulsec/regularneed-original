<div class="row">
    @foreach ($ads as $ad)
        <div class="col-md-6 mb-4">
            <div class="card">
                @if ($ad->image)
                    <img style="height: 30px; width: 100%;" src="{{ $ad->image }}" class="card-img-top"
                        alt="{{ $ad->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $ad->title }}</h5>
                    <p class="card-text">{{ $ad->content }}</p>
                    <form method="POST" action="{{ route('ads.view', $ad) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">View & Earn Coins</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
