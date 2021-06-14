<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <p class="card-title">Cron pattern</p>
                <div class="mb-1">
                    <input wire:model="minute" type="text" class="form-control">
                    <input wire:model="hour" type="text" class="form-control">
                    <input wire:model="day" type="text" class="form-control">
                    <input wire:model="month" type="text" class="form-control">
                    <input wire:model="weekday" type="text" class="form-control">
                </div>
                <div class="d-block @if($result == 'error') invalid-feedback @else valid-feedback @endif">
                    {{ $result }}
                </div>
                <button wire:click="saveSettings" class="btn btn-success mt-3" @if($result == 'error') disabled @endif>
                    <span wire:loading wire:target="saveSettings" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span wire:loading wire:target="saveSettings">Updating</span>
                    <span wire:loading.remove wire:target="saveSettings">Save</span>
                </button>
                <button wire:click="parse" wire:loading.attr="disabled" wire:target="parse" class="btn btn-primary mt-3">
                    <span wire:loading wire:target="parse" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span wire:loading wire:target="parse">Running</span>
                    <span wire:loading.remove wire:target="parse">Run parsing schedule</span>
                </button>
                <div class="d-block invalid-feedback mt-3">
                    This button runs schedule cron only once. To make scheduler work background you need to add settings into your server.
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .cron {
            /*  */
        }

        input[type="text"] {
            width: 40px;
            padding: .375rem 0.2rem;
            text-align: center;
            display: inline-block;
        }
    </style>
@endpush
