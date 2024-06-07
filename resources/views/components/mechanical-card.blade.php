@php
    use Illuminate\Support\Str;
@endphp
@vite(['resources/css/card.css'])
<style>
    .buttondel::before {
      content: '@lang(' delete')';
  }
  </style>
<div class="col-sm-4 p-3">
    <div class="card">
        <img src="https://static.vecteezy.com/system/resources/previews/020/377/086/original/mechanical-engineer-worker-color-icon-illustration-vector.jpg" class="card-img-top p-5" alt="..." height="300px">
        <div class="card-body">
            <h5 class="card-title">{{ $mechanical->name }}</h5>
            <p class="card-text">{{ Str::limit($mechanical->bio, 50, '....') }}</p>
            <a class="btn btn-outline-dark stretched-link" href="{{ route('mechanicals.show', $mechanical->id) }}">@lang('show_more')</a>
        </div>
        <div class="card-foot border-top px-3 py-3 bg-light" style="z-index: 9">
            <form action="{{ route('mechanicals.destroy', $mechanical->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="buttondel float-end">
                    <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
                </button>
            </form>
        </div>  
    </div>
</div>
