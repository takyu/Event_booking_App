<div>
  <div class="mt-4 text-center text-sm">
    日付を選択してください。一ヶ月先まで選択可能です。
  </div>

  <input id="calender" class="mx-auto mb-4 mt-1 block" type="text" name="calender" value="{{ $currentDate }}"
    wire:change="getDate($event.target.value)" />

  <div class="mx-auto flex whitespace-nowrap">
    <x-calender-time />
    @for ($i = 0; $i < \EventConst::COUNT_DAYS_OF_WEEK; $i++)
      <div class="w-32">
        <div class="border border-gray-200 py-1 px-2 text-center">
          {{ $currentWeek[$i]['day'] }}
        </div>
        <div class="border border-gray-200 py-1 px-2 text-center">
          {{ $currentWeek[$i]['dayOfWeek'] }}
        </div>
        @for ($j = 0; $j < \EventConst::COUNT_EVENT_TIME; $j++)
          @if ($events->isNotEmpty())
            @if (!empty($events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \EventConst::EVENT_TIME[$j])))
              @php
                $eventInfo = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \EventConst::EVENT_TIME[$j]);
                $eventName = $eventInfo->name;
                
                $eventPeriod = \Carbon\Carbon::parse($eventInfo->start_date)->diffInMinutes($eventInfo->end_date) / 30 - 1;
              @endphp
              <div class="h-8 border border-gray-200 bg-blue-100 py-1 px-2">
                {{ $eventName }}
              </div>
              @if ($eventPeriod > 0)
                @for ($k = 0; $k < $eventPeriod; $k++)
                  <div class="h-8 border border-gray-200 bg-blue-100 py-1 px-2"></div>
                @endfor
                @php
                  $j += $eventPeriod;
                @endphp
              @endif
            @else
              <div class="h-8 border border-gray-200 py-1 px-2"></div>
            @endif
          @endif
        @endfor
      </div>
    @endfor
  </div>
</div>
