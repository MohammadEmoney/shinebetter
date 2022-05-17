@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Creat The Todo List</h4>
                <p class="card-description">
                </p>
                <form method="POST" action="{{ route('todos.store') }}">
                    @csrf
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" name="name" placeholder="Todo's Name" aria-label="Todo's Name" required>
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-primary" type="submit" id="add-todo">
                              <i class="mdi mdi-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Todos List</h4>
            <p class="card-description">
            </p>
            <div class="table-responsive">
            <table class="table table-striped" id="todo-table">
                <thead>
                <tr>
                    <th>todo</th>
                    <th>Name</th>
                    <th>Done</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($todos as $key => $todo)
                    <tr>
                        <td class="py-1">{{  ($todos->currentpage()-1) * $todos->perpage() + $key + 1 }}</td>
                        <td class="{{ $todo->done ? "text-info" : "" }}">{{ $todo->name }}</td>
                        <td>
                            <div class="form-check form-check-success">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input todo-done" data-edit-route="{{ route( 'todos.update', $todo->id) }}" {{ $todo->done ? "checked" : ""}} >
                                <i class="input-helper"></i></label>
                            </div>
                        </td>
                        <td>
                            <form method="post" class="delete-form" data-route="{{ route('todos.destroy' , $todo->id) }}">
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="mdi mdi-delete"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $todos->links("pagination::bootstrap-4") }}
            </div>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {

    $('.todo-done').change(function(e) {
        e.preventDefault();
        var table = $("#todo-table"),
            todoRoute = $(this).data('edit-route'),
            $this = $(this),
            done;
            console.log(this.checked);

        if(this.checked) {
            done = this.checked
        }else{
            done = this.checked
        }
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: todoRoute,
            data: {
                _method: "PATCH",
                done:done
            },
            success: function (response, textStatus, xhr) {
                console.log(response);
                if(response.done){
                    $this.closest( "td" ).prev().addClass("text-info")
                }else{
                    $this.closest( "td" ).prev().removeClass();
                    // console.log($this.closest( ".text > s" ));
                    // $this.closest( ".text > s" ).unwrap()
                }
            }
        });
    })

    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: $(this).data('route'),
            data: {
                _method: 'DELETE'
            },
            success: function (response, textStatus, xhr) {
                $this.closest("tr").remove();
            }
        });
    })
});
</script>
@endsection
