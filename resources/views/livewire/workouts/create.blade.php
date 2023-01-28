<div>
    <ul class="nav justify-content-end border-bottom">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" wire:click="addRepeat" href="#">Crea</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul>
    <div class="mt-3"></div>
    <form>
        @if(count($repeats) > null)
            @foreach($repeats as $repeat)
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center g-3">
                            <div class="col-auto">
                                <label for="inputRepeats{{$repeat}}" class="col-form-label">Ripeti</label>
                            </div>
                            <div class="col-1">
                                <input wire:model="r_{{$repeat}}" type="text" id="inputRepeats{{$repeat}}"
                                       class="form-control">
                            </div>
                            <div class="col-auto">
                                <label for="inputTimes" class="col-form-label">volte</label>
                            </div>
                        </div>
                        <div class="row g-3 mt-1">

                            <div class="col-4 alert alert-secondary me-1" role="alert">
                                Durata
                            </div>
                            <div class="col-3 alert alert-secondary me-1" role="alert">
                                Lavoro
                            </div>
                            <div class="col-3 alert alert-secondary me-1" role="alert">
                                Range
                            </div>
                            <div class="row g-3 mt-1">

                                <div class="col-4 alert alert-secondary me-1" role="alert">
                                    Durata
                                </div>
                                <div class="col-3 alert alert-secondary me-1" role="alert">
                                    Lavoro
                                </div>
                                <div class="col-3 alert alert-secondary me-1" role="alert">
                                    Range FTP %
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </form>

</div>
