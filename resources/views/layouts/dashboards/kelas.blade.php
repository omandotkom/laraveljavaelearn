<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="card-title">@if(isset($num)) <b style="font-size:25px;">@php echo $num; @endphp</b> @endif Manajemen Kelas</h4>
            </div>
            <div class="d-flex align-items-center flex-row mt-30">
                <img src="{{url('dashboardasset/img/classroom.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
            </div>
            <div class="d-flex align-items-center flex-row mt-30">
                @if(Auth::user()->role == "student")
                @if (isset($userclass) && $userclass != null)
                <a type="button" role="button" href="{{route('ruleindex',$userclass->class_id)}}" class="btn mx-auto btn-outline-info"></i>Tata Tertib Kelas</a>
                @endif
                @else
                    <a type="button" role="button" href="{{route('indexclass')}}" class="btn mx-auto btn-outline-info"></i>Input Info Kelas</a>
                @endif
            </div>
        </div>
    </div>
</div>