@extends('admin.layouts.app')
@section('title')
    {{ __('sms_template_list') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title line-height-36">{{ __('sms_template_list') }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('type') }}</th>
                                    <th>{{ __('content') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th width="10%">{{ __('action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sms_templates as $key => $sms)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $sms->type }}</td>
                                        <td>{{ $sms->content }}</td>
                                        <td class="text-center" tabindex="0">
                                            <a href="javascript:void(0)">
                                                <label class="switch ">
                                                    <input data-id="{{ $sms->id }}" type="checkbox"
                                                        class="success status-switch"
                                                        {{ $sms->status == 1 ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('smsTemplate.edit', $sms->type) }}" class="btn bg-info"><i
                                                    class="fas fa-edit"></i></a>

                                            {{-- <form action="{{ route('smsTemplate.destroy', $sms->type) }}" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    onclick="return confirm('are_you_sure_you_want_to_delete_this_item');"
                                                    class="btn bg-danger"><i class="fas fa-trash"></i>
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            {{ __('no_data_found') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="col-3 m-auto">
                            {{ $sms_templates->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @if (!empty($smsTemplate))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title line-height-36">{{ __('edit') }}</h3>
                            <a href="{{ route('smsTemplate.index') }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-plus mr-1"></i>{{ __('create') }}
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="pt-3 pb-4">
                                <form class="form-horizontal" action="{{ route('smsTemplate.update', $smsTemplate->slug) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                        <x-forms.label name="type" for="type" :required="true" />
                                        <div class="col-sm-10">
                                            <input id="type" type="text" name="type"
                                                value="{{ old('type', $smsTemplate->type) }}"
                                                class="form-control @error('type') is-invalid @enderror">
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <x-forms.label name="content" for="content" :required="true" />
                                        <div class="col-sm-10">
                                            <textarea name="content" id="content" cols="20" rows="10"
                                                class="form-control @error('content') is-invalid @enderror">{{ old('content', $smsTemplate->content) }}</textarea>
                                            @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row m-auto">
                                        <button type="submit" class="btn btn-success offset-sm-2">
                                            <i class="fas fa-sync mr-1"></i>
                                            {{ __('save') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                @if (empty($smsTemplate))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title line-height-36">{{ __('create') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="pt-3 pb-4">
                                <form class="form-horizontal" action="{{ route('smsTemplate.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <x-forms.label name="type" for="type" :required="true" />
                                        <div class="col-sm-10">
                                            <input id="type" type="text" name="type"
                                                value="{{ old('type') }}"
                                                class="form-control @error('type') is-invalid @enderror">
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <x-forms.label name="content" for="content" :required="true" />
                                        <div class="col-sm-10">
                                            <textarea name="content" id="content" cols="30" rows="10"
                                                class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                            @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row m-auto">
                                        <button type="submit" class="btn btn-success offset-sm-2">
                                            <i class="fas fa-sync mr-1"></i>
                                            {{ __('save') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 35px;
            height: 19px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            display: none;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 3px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input.success:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(15px);
            -ms-transform: translateX(15px);
            transform: translateX(15px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script>
        $('.status-switch').on('change', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('admin.change.smsTemplate.status') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(response) {
                    toastr.success(response.message, 'Success');
                }
            });
        });

    </script>
@endsection
