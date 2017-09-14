<!DOCTYPE html>
<html>
  <head>
    <title>Pusher messages</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="content">
        <h1>Pusher messages</h1>
        <ul id="messages" class="list-group">
        </ul>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
      // Pusher.logToConsole = true;
      
      var pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: 'eu',
        encrypted: true
      });

      var channel = pusher.subscribe('task');

      channel.bind('App\\Events\\TaskCreated', function(data) {
        var listItem = $("<li class='list-group-item'></li>");
        listItem.html('Task #' + data.task.id + ': <b>' + data.task.name + '</b> - ' + data.task.content);
        $('#messages').prepend(listItem);
      });
    </script>
  </body>
</html>