@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-12" >
<h1>Laravel CRDU wiht ajax</h1>
</div>
</div>
<div class="row">
<div class="table table-responsive">
<table class="table table-bordered" id="table">
 <tr>
<th width="150px">No</th>
 <th>Name</th>
  <th>Email</th>
   <th class="text-center" width="150px">
    <a href="#" class="create-modal btn btn-success btn-sm">
        <i class="fas fa-plus-circle"></i>
    </a>
   </th>
 </tr>
    {{ csrf_field () }}
    <?php $n=1;?>
    @foreach($user as $key =>$value)
        <tr class="user{{$value->id}}">
         <td>{{$n++}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td>
             <a href="#"  class="show-modal btn btn-info btn-sm"  data-id="{{$value->id}}" data-name="{{$value->name}}" data-email="{{$value->email}}">
              <i class="fa fa-eye"></i>
             </a>
                <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" data-email="{{$value->email}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="delete-modal btn btn-danger btn-sm"  data-id="{{$value->id}}" data-name="{{$value->name}}" data-email="{{$value->email}}">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach

</table>
</div>

</div>
    {{--for add new user--}}
    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add</h4>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form">
                <div class="form-group row add">
                    <label class="control-lable col-sm-2 " for="name">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="Name user" required>
                        <p class="error text-center alert alert-danger hidden"></p>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-lable col-sm-2 " for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email user" required>
                        <p class="error text-center alert alert-danger hidden"></p>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-lable col-sm-2 " for="password">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="password user" required>
                        <p class="error text-center alert alert-danger hidden"></p>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-lable col-sm-2 " for="conpassword">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="conpassword" id="conpassword" value="" placeholder=" confirm password user" required>
                        <p class="error text-center alert alert-danger hidden"></p>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
         <button class="btn btn-warning" type="submit" id="adduser">Save</button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">close</button>
        </div>
    </div>

{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">ID :</label>
                      <b id="I"/>
                    </div>
                    <div class="form-group">
                      <label for="">Name :</label>
                      <b id="Na"/>
                    </div>
                    <div class="form-group">
                      <label for="">Email :</label>
                      <b id="Em"/>
                    </div>
                    </div>
                    </div>
                  </div>
</div>


{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">
        <div class="form-group" hidden>
            <label class="control-label col-sm-2"for="name">name</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="upid">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="name">name</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="upname">
            </div>
          </div>
 
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="title"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>
      </div>
    </div>
  </div>
</div>


@endsection
