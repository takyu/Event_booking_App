<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      イベント管理
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        <section class="body-font text-gray-600">
          <div class="container mx-auto px-4 py-8">
            @if (session('status'))
              <div class="m-10 mx-auto w-1/2 bg-blue-300 p-2 text-white">
                {{ session('status') }}
              </div>
            @endif
            <div class="mb-4">
              <button onclick="location.href='{{ route('events.create') }}'"
                class="ml-auto flex rounded border-0 bg-green-500 py-2 px-6 text-white hover:bg-green-600 focus:outline-none">新規登録</button>
            </div>
            <div class="mb-20 flex w-full flex-col text-center">
              <div class="mx-auto w-full overflow-auto">
                <table class="whitespace-no-wrap mb-4 w-full table-auto text-left">
                  <thead>
                    <tr>
                      <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                        イベント名</th>
                      <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                        開始日時
                      </th>
                      <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                        終了日時</th>
                      <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                        予約人数
                      </th>
                      <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                        定員
                      </th>
                      <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                        表示・非表示
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($events as $event)
                      <tr>
                        <td class="px-4 py-3">{{ $event->name }}</td>
                        <td class="px-4 py-3">{{ $event->start_date }}</td>
                        <td class="px-4 py-3">{{ $event->end_date }}</td>
                        <td class="px-4 py-3">まだ</td>
                        <td class="px-4 py-3">{{ $event->max_people }}</td>
                        <td class="px-4 py-3">{{ $event->is_visible }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="my-6">
                  {{ $events->links() }}
                </div>
              </div>
              <div class="mx-auto mt-4 flex w-full pl-4 lg:w-2/3">

              </div>
            </div>
        </section>
      </div>
    </div>
  </div>
</x-app-layout>