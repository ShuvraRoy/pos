<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
   <div class="form-group">
    <select name="division" id="division" class="form-control input-lg dynamic" data-dependent="district">
     <option value="">Select Division</option>
     @foreach($division_list as $division)
     <option value="{{ $division->division_id}}">{{ $division->en_division_name }}</option>
    
     @endforeach
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="district" id="district" class="form-control input-lg dynamic" data-dependent="upazila">
     <option value="">Select District</option>
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="upazila" id="upazila" class="form-control input-lg">
     <option value="">Select Upazila</option>
    </select>
   </div>
   {{ csrf_field() }}
   <br />
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("division_id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
    var select = $(this).attr("division_id");
   var value = $(this).val();
   var district_select = $(this).attr("district_id");
   var district_value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch_upazila') }}",
    method:"POST",
    data:{district_select:district_select, select:select, value:value, district_value:district_value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

  $('#division').change(function(){
  $('#district').val('');
  $('#upazila').val('');
 });

 $('#district').change(function(){
  $('#upazila').val('');
 });
 

});
</script>
