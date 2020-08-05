@extends('../layout/layout')

@section('content')
<div>
    <span style="font-size: 30px; margin-left: 60px;"></span>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログインしてください</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group{{ $errors->has('employee_code') ? ' has-error' : '' }} row">
                            <label for="employee_code" class="col-md-4 col-form-label text-md-right">社員ID</label>

                            <div class="col-md-6">
                                <input id="employee_code" type="text" class="form-control" name="employee_code" value="{{ old('employee_code') }}" required autofocus>

                                @if ($errors->has('employee_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ログイン
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
