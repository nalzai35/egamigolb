@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Keywords</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <p><span><strong>Total keywords</strong></span> = {{ App\Keyword::all()->count() }}</p>
                        <p><span class="text-success"><strong>Publish keywords</strong></span> = {{ App\Keyword::where('post_id', '!=', null )->count() }}</p>
                        <p><span class="text-danger"><strong>Unpublish keywords</strong></span> = {{ App\Keyword::where('post_id', '=', null )->count() }}</p>
                    </div>
                    <form action="{{ route('keyword.insert') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="keyword" class="form-control" id="keyword" rows="15"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary ml-auto">Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
