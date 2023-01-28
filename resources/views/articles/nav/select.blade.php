<div class="dropdown">
    <a class="btn btn-primary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-gear"></i>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

      <a class="dropdown-item" href="{{ route('articles.show', $article->id) }}"><i class="bi bi-journal-text me-1"></i>Scheda</a>

      <a class="dropdown-item" href="{{ route('articles.edit', $article->id) }}"><i class="bi bi-pencil-square me-1"></i>Modifica</a>

      <a class="dropdown-item" href="{{ route('article.get', [$article->id, 'load']) }}"><i class="bi bi-file-earmark-plus-fill me-1"></i>Carica</a>

      <a class="dropdown-item" href="{{ route('article.get', [$article->id, 'unload']) }}"><i class="bi bi-file-earmark-minus-fill me-1"></i>Scarica</a>
    </div>
  </div>