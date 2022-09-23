<?php
$data = file_get_contents("data.json");

print_r($data);


?>
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
  $.getJSON("data.json", function(json) {

    for (let i = 0; i < Object.keys(json).length; i++) {
      document.write("Nama : " + json[i]["nama"] + "<br>");
      document.write("NIM : " + json[i]["NIM"] + "<br><br>");
    }
  });
</script> -->