@extends('component.layout')

@section('content')
<h1 class="mt-4">{{ $tugas->nama }}</h1>
<div>
<a href="{{ route('tugas.index', $tugas->kloter_id) }}" class="btn btn-primary mb-3">kembali</a>

    @foreach ($tugas->tasks as $key => $task)
        <div class="form-group">
            <label for="name">
                {{ $tugas->title[$key] }}
            </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $task === '0' ? 'sudah' : ($task === '1' ? 'tidak terpenuhi' : ($task === '2'? 'dikerjakan oleh rekan' : 'error')) }}">
        </div>
    @endforeach
</div>
@endsection
