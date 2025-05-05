<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <table class="table table-stripped" id="post_jobs">
        <thead>
            <th>
                Firstname
            </th>
            <th>
                Surname
            </th>
            <th>
                Email
            </th>
            <th>
                Job Applied
            </th>
            <th>
                Position Applied
            </th>
            <th>
                Gender
            </th>
            <th>
                Status
            </th>
            <th>
                Resume
            </th>
            <th>
                Date Applied
            </th>
            <th>Rank</th>
            <th>
                Action
            </th>

        </thead>
        <tbody>
            @foreach($results as $app)
            <tr>
                <td>{{$app->name}}</td>
                <td>{{$app->surname}}</td>
                <td>{{$app->email_address}}</td>
                <td>{{$app->job->description}}</td>
                <td>{{$app->job->positions->title}}</td>
                <td>{{$app->gender}}</td>
                <td>{{$app->status}}</td>
                <td>{{$app->resume ?? 'N/A'}}</td>
                <td>{{$app->created_at}}</td>
                <td>{{$app->rank}}</td>

                <td>
                    <a href="#" class="btn btn-sm btn-round btn-primary">
                        Preview
                    </a>
                    @if($app->status == 'Pending')
                    <button type="button" class="btn btn-sm btn-round btn-warning" data-toggle="modal" data-target="#updateApplicationStatusModal" data-id="{{$app->id}}">
                        COnsider Applicant
                    </button>
                    @endif
                    <button type="button" class="btn btn-sm btn-round btn-danger" data-toggle="modal" data-target="#deleteApplicationModal" data-id="{{$app->id}}">
                        Remove
                    </button>
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
