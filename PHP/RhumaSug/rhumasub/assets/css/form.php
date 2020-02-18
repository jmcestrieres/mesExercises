<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<style>

</style>

<input type="password" id="some-field"><br>
<label for="visibility">
  <input id="visibility" type="checkbox"> 
  <span>Unmask Password</span>
</label>

<p><em>Note that this only works in good browsers and IE9+.</em></p>

<script>
$("#visibility").change(function(){
  if ($(this).is(":checked")) {
    $("#some-field").prop("type", "text");
  } else {
    $("#some-field").prop("type", "password");
  }
});
</script>

</body>
</html>