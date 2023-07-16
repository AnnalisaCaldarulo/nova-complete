<x-layout>
    <div class="container">
        <div class="row bg-info w-100 h-100 align-items-center">
            <h1 class="display-5 text-center">
                Welcome
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center my-5">
            @forelse($articles as $article)
                <div class="col-12 col-md-4">
                    <div class="card" style="border:none!important; background-color: transparent!important;">
                        <img src="{{ $article->getFirstMediaUrl('gallery', 'index_cover') }}" alt="{{ $article->title }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <h6 class="card-subtitle fst-italic text-muted mb-3">{{ $article->subtitle }}</h6>
                            {{-- <a href="{{ route('articles.show', compact('article')) }}" class="btn btn-dark mt-3">Leggi
                                l'articolo</a> --}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 col-md-6">
                    <h3>Non ci sono ancora articoli! Torna tra qualche giorno!</h3>
                </div>
            @endforelse
        </div>

    </div>
</x-layout>
