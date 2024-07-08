<div>
    {{-- Be like water. --}}
    <table class="table table-stripped table-border table-responsive-sm table-hover table-active" id="active_jobs">

        <th>Category</th>
        <th>Title</th>
        <th>Position</th>
        <th>Job Description</th>
        <th>Status</th>
        <th>Manage</th>
    </table>
    <tbody>

        @foreach ($results as $job)

            <tr>
                <td>
                    {{ $job->category->name }}

                </td>
                <td>

                    {{ $job->title }}

                </td>
                <td>
                    {{ $job->positions->title }}

                </td>

                <td>
                    {{ $job->description }}

                </td>
                <td>
                    {{ $job->status }}

                </td>
                <td>
                    <a href="{{ route('a-preview-posted-job', $job->id) }}"
                        class="btn btn-primary btn-sm " type="button">View
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</div>
