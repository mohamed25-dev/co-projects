<div wire:poll.visible="getProgress">
    <div wire:poll.visible="getProgress" class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center text-right">
                <div class="col me-2 px-4">
                    @if ($progress != null)
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  تقدم
                            إرسال النشرة</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $progress }}</div>
                    @else
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> لا توجد نشرة حاليا
                            لإرسالها</div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
