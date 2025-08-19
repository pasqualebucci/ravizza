@php
$items = json_decode($getState(), true) ?? [];
@endphp

<div class="space-y-4">
    @foreach ($items as $item)
    <div class="border p-4 rounded-lg">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="font-medium">{{ $item['name'] }}</div>
                <div class="text-sm text-gray-500">ID: {{ $item['id'] }}</div>
                <img style="width:120px; margin-top:1rem" src="{{ $item['image'] }}" alt="{{ $item['name'] }}" />
            </div>
            <div class="text-right">
                <div>Quantità: {{ $item['quantity'] }}</div>
                <div>Prezzo: €{{ number_format($item['price'], 2) }}</div>
            </div>
        </div>


        @if (!empty($item['metadata']))
        <div class="mt-2 pt-2 border-t">
            <div class="flex justify-between">
                <div class="space-y-2">
                    <h4 class="font-medium">Personalizzazioni</h4>
                    <div class="space-y-1">
                        @foreach ($item['metadata']['personalizzazioni'] as $key => $value)
                        <div>
                            <span class="text-sm font-medium">{{ $key }}:</span>
                            <span class="text-sm">{{ $value }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="space-y-2">
                    <h4 class="font-medium">Misure</h4>
                    <div class="space-y-1">
                        @foreach ($item['metadata']['misure'] as $key => $value)
                        <div>
                            <span class="text-sm font-medium">{{ $key }}:</span>
                            <span class="text-sm">{{ $value }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endforeach
</div>