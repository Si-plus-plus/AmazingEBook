<div class="col-sm-4 py-2 px-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                {{ Str::limit($ebook->title, 25) }}
            </h4>
            <h5 class="card-subtitle mb-4">
                {{ Str::limit($ebook->author, 30) }}
            </h5>
            <p class="card-text">
                {{ Str::limit($ebook->description, 80) }}
            </p>
        </div>
        <a href = "{{ route('ebook.show', ['ebook' => $ebook->id]) }}" class="stretched-link"></a>
    </div>
</div>
