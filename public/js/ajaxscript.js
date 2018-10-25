$(document).on('click','.create-modal',function (){
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add user');
    
});

$("#adduser").click(function() {
    $.ajax({
        type: 'POST',
        url: 'addUser',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val(),
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val(),
        },
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
                $('.error').text(data.errors.email);
                $('.error').text(data.errors.password);
            } else {
                $('.error').remove();
                $('#table').append("<tr class='user" + data.id + "'>"+
                    "<td>" + data.id + "</td>"+
                    "<td>" + data.name + "</td>"+
                    "<td>" + data.email + "</td>"+
                    "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "'><i class='fa fa-eye'></i></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "'><i class='fas fa-edit'></i></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "'><i class='fas fa-trash'></i></button></td>"+
                    "</tr>");
            }
        },
    });
    $('#name').val('');
    $('#email').val('');
});





// function Edit name
$(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update Post");
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('name Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#upid').val($(this).data('id'));
    $('#upname').val($(this).data('name'));
    $('#myModal').modal('show');
    });


  // Show function
  $(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('#I').text($(this).data('id'));
    $('#Na').text($(this).data('name'));
    $('#Em').text($(this).data('email'));
    $('.modal-title').text('Show user');
    });

//
$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
      type: 'POST',
      url: 'edituser',
      data: {
  '_token': $('input[name=_token]').val(),
  'id': $("#upid").val(),
  'name': $("#upname").val(),
 
      },
  success: function(data) {
        $('.user' + data.id).replaceWith(" "+
        "<tr class='user" + data.id + "'>"+
        "<td>" + data.id + "</td>"+
        "<td>" + data.name + "</td>"+
        "<td>" + data.email + "</td>"+
        "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "'><i class='fa fa-eye'></i></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "'><i class='fas fa-edit'></i></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "'><i class='fas fa-trash'></i></button></td>"+
        "</tr>");
      }
    });
  });

  //----------------------------------
  // form Delete function
$(document).on('click', '.delete-modal', function() {
    $('#footer_action_button').text(" Delete");
  
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Delete user');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('.name').html($(this).data('name'));
    $('#myModal').modal('show');
    });
    
    $('.modal-footer').on('click', '.delete', function(){
      $.ajax({
        type: 'POST',
        url: 'deleteuser',
        data: {
          '_token': $('input[name=_token]').val(),
          'id': $('.id').text()
        },
        success: function(data){
           $('.user' + $('.id').text()).remove();
        }
      });
    });
  






