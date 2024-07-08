<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

   <table id="postedJobs" class="table table-stripped table-hover">
    <thead>
        <th>Job Title</th>
        <th>Description</th>
        <th>Date Posted</th>
        <th>Expires</th>
        <th>Status</th>
        <th class="text-center">Action</th>
    </thead>
    <tbody>
        @foreach($results as $result)
        <tr>
            <td>{{$result->position_id}}</td>
            <td>{{$result->description}}</td>
            <td>{{$result->from_date}}</td>
            <td>{{$result->to_date}}</td>
            <td>
                @if($result->status =='Active')
                <label class="label label-primary label-md">{{$result->status}}</label>
                @else
                <label class="label label-danger label-md">{{$result->status}}</label>
                @endif
            </td>
            <td>
                <a href="{{route('c-job-preview', ['id'=>$result->id])}}" type="button" class=" btn btn-hor btn-grd-primary btn-sm m-b-1 btn-round" data-id ={{$result->id}}><i class="feather icon-eye"></i>View</a>
                <button  type="button" class="btn btn-hor btn-grd-success btn-sm m-b-1 btn-round" data-id ={{$result->id}}><i class="feather icon-download"></i>File</button>
            </td>
        </tr>
        @endforeach
    </tbody>
   </table>
   {{-- {{$results->links()}} --}}
</div>
