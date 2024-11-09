@extends('admin.layouts.layout')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Bank Ledger</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Banks</a></div>
            <div class="breadcrumb-item">Ledger</div>
        </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">Create New Post</h2>
        <p class="section-lead">
            On this page you can create a new post and fill in all fields.
        </p> --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Bank Entry</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.ledger.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Entry
                                    Description</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="description" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" min="0" name="amount" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tansaction
                                    Type</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="type" class="form-control">
                                        <option selected disabled>Please select debit or credit</option>
                                        <option value="credit">Credit</option>
                                        <option value="debit">Debit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bank</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="bank_id" class="form-control">
                                        <option selected disabled>Please select bank</option>
                                        @foreach ($banks as $bank)
                                        <option value={{ $bank->id }}>{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
