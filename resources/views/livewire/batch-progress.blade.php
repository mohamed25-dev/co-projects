<div wire:poll.visible="getProgress" class="card border-left-info shadow h-100 py-2">
    <div class="col me-2 px-4">
        @if ($cancelled == true)
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ألغيت النشرة</div>
        @elseif ($failed == true)
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> حدث خطأ ما</div>
        @elseif($finished == true)
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">تم إرسال النشرة بنجاح</div>
        @elseif($progress != null)
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">{{$progress}}%</div>
            </div>
           
        @else
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> لا شئ حاليا </div>
        @endif
    </div>
</div>
