<div class="table-responsive"> <!-- ✅ Ensure table wrapper is here -->
    <table class="table table-striped table-bordered table-hover w-100" id="active_jobs">
        <thead>
            <tr>
                <th>Category</th>
                <th>Title</th>
                <th>Position</th>
                <th>Job Description</th>
                <th>Status</th>
                <th>Manage</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $job)
                <tr>
                    <td>{{ $job->category->name }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->positions->title }}</td>
                    <td class="text-truncate" style="max-width: 200px;"> <!-- ✅ Prevents excessive width -->
                        {{ $job->description }}
                    </td>
                    <td>{{ $job->status }}</td>
                    <td>
                        <a href="{{ route('a-preview-posted-job', $job->id) }}"
                           class="btn btn-primary btn-round btn-block btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
