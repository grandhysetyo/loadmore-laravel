<!DOCTYPE html>
<html>
    <head>
        <title>Load More Data in Laravel using Ajax</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .panel-body { 
                margin:4px, 4px; 
                padding:4px;                 
                height: 500px; 
                overflow-x: hidden; 
                overflow-y: auto; 
                text-align:justify; 
            }

            /*
            *  style scroll
            */

            #style-2::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                border-radius: 10px;
                background-color: #F5F5F5;
            }

            #style-2::-webkit-scrollbar {
                width: 8px;
                background-color: #F5F5F5;
            }

            #style-2::-webkit-scrollbar-thumb {
                border-radius: 10px;
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
                background-color: #73AD0E;
            }
        </style>
    </head>
<body>  
    <div class="container box">
        <h3 align="center">Load More Data in Laravel using Ajax</h3><br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Post Data</h3>
            </div>
            <div class="panel-body" id="style-2">
                {{ csrf_field() }}
                <div id="post_data"></div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"{{ route('load_data') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data); 
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 });

});
</script>