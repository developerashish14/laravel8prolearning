<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List student</h2>
  <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentModal">
    Add Student
  </button></p>            
  <table class="table" id="studentTable">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
      <tr id="sid{{$student->id}}">
        <td>{{$student->firstname}}</td>
        <td>{{$student->lastname}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->phone}}</td>
        <td>
            <a href="javascript:void(0)" onclick="editStudent({{$student->id}})" class="btn btn-info">Edit</a>
                 </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<!--add model -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="studentForm">
              @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Firstname</label>
                    <input type="text" class="form-control" id="firstname"  placeholder="Enter first">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lst name</label>
                    <input type="text" class="form-control" id="lastname"  placeholder="Enter lst">
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input type="email" class="form-control" id="email"  placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone</label>
                  <input type="text" class="form-control" id="phone" placeholder="Phone">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>

  
<!--Udate model -->
<div class="modal fade" id="studentEditModal" role="dialog">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="studentEditForm">
            @csrf
            <input type="hidden" class="form-control" id="id"  placeholder="Enter first">
              <div class="form-group">
                  <label for="exampleInputEmail1">Firstname</label>
                  <input type="text" class="form-control" id="firstname1"  placeholder="Enter first">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Lst name</label>
                  <input type="text" class="form-control" id="lastname1"  placeholder="Enter lst">
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="email" class="form-control" id="email1"  placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" id="phone1" placeholder="Phone">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
  $("#studentForm").submit(function(e){
    e.preventDefault();
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let _token = $("input[name=_token]").val();

    $.ajax({
      url:"{{route('student.add')}}",
      type:"post",
      data:{firstname:firstname,lastname:lastname,email:email,phone:phone,_token:_token},
      success:function(response)
      {
        if(response)
        {
          $("#studentTable tbody").prepend('<tr><td>'+response.firstname+'</td><td>'+response.lastname+'</td><td>'+response.email+'</td><td>'+response.phone+'</td></tr>');
          $("#studentForm")[0].reset();
         // $("#studentModal").model('hide');
         location.reload();
        }
        else{
          alert('test');
        }
      }
    })
  });
  </script>
  <script>
    function editStudent(id){
      
      $.get('/students/'+id,function(student){
      
        $("#id").val(student.id);
        $("#firstname1").val(student.firstname);
        $("#lastname1").val(student.lastname);
        $("#email1").val(student.email);
        $("#phone1").val(student.phone);
      
        $('#studentEditModal').modal('toggle');
        
      });
    }
    </script>

    <script>
          $("#studentEditForm").submit(function(e){
            e.preventDefault();
            let id = $("#id").val();
            let firstname = $("#firstname1").val();
            let lastname = $("#lastname1").val();
            let email = $("#email1").val();
            let phone = $("#phone1").val();
            let _token = $("input[name=_token]").val();
           
            
            $.ajax({
              url:"{{route('student.update')}}",
              type:"PUT",
              data:{firstname:firstname,lastname:lastname,email:email,phone:phone,_token:_token},
              success:function(response)
              {
                if(response)
                {
                 
                 // location.reload();
                  $("#studentModal").model('hide');
                }
                else{
                  alert('test');
                }
              }
            })


          });
      </script>
</body>
</html>