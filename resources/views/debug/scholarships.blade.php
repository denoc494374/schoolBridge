@php
    $all = \App\Models\Scholarship::count();
    $open = \App\Models\Scholarship::where('status', 'open')->count();
    $openWithFutureDeadline = \App\Models\Scholarship::where('status', 'open')->where('deadline', '>', now())->count();
@endphp

<x-app-layout>
    <div class="container mt-5">
        <h1>Scholarship Debug Info</h1>
        <ul>
            <li>Total Scholarships: <strong>{{ $all }}</strong></li>
            <li>Open Scholarships: <strong>{{ $open }}</strong></li>
            <li>Open with Future Deadline: <strong>{{ $openWithFutureDeadline }}</strong></li>
        </ul>

        <h2 class="mt-4">All Scholarships:</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th>Deadline > Now?</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Scholarship::all() as $s)
                    <tr>
                        <td>{{ $s->title }}</td>
                        <td>{{ $s->status }}</td>
                        <td>{{ $s->deadline }}</td>
                        <td>{{ $s->deadline > now() ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
