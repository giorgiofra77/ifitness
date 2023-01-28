@extends('template.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-center">{{ __('Modifica Tesst') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-danger" href="#" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.cancel') }}</a>
                    </div>



                    <form method="POST" action="#">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputCode">Data test</label>
                            <input type="date" class="form-control @error('date_test') is-invalid @enderror" value="{{ old('date_test', $test->date_test) }}" name="date_test" required>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Peso atleta</label>
                                <input type="number" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight', $test->weight) }}"  name="weight" required>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Watt alla soglia</label>
                                <input type="number" class="form-control @error('threshold_watt') is-invalid @enderror" value="{{ old('threshold_watt', $test->threshold_watt) }}"  name="threshold_watt">
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Watt massimnali</label>
                                <input type="number" step="1" class="form-control @error('max_watt') is-invalid @enderror" value="{{ old('max_watt', $test->max_watt) }}" name="max_watt">
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Note</label>
                                <input type="text" class="form-control @error('note_test') is-invalid @enderror" value="{{ old('note_test', $test->note_test) }}" name="note_test">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check me-2"></i>{{ __('Modifica') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
