<?
// ThingPlug에서 get한 링크를
// 포스트맨으로 확인하여 웹 페이지에 출력하는 소스
?>

<body>
    
  <span id="ajaxButton" style="cursor: pointer; text-decoration: underline">
    Make a request
  </span>

  <script type="text/javascript">
(function() {
    var xhr_data = new XMLHttpRequest();
    xhr_data.onreadystatechange = function () {
        if (xhr_data.readyState == 4 && xhr_data.status == 200) { 
            parser = new DOMParser();
            xmlDoc = parser.parseFromString(xhr_data.responseText, "text/xml");
       }
    }
    // false하니까 잘된다.
    xhr_data.open("GET", "https://onem2m.sktiot.com:9443/ThingPlug?division=searchDevice&function=myDevice&startIndex=1&countPerPage=6",false);

    xhr_data.setRequestHeader('X-M2M-RI', '0');
    xhr_data.setRequestHeader('X-M2M-Origin', '0');
    xhr_data.setRequestHeader('ukey', 'R1VLNHhRWDBhQUpkSEI0TGhIUUI3d09rOS9HQmo0REt3R0swelZOWWZPcHNvTnJpYzZFSEt2c3NKQnk3RVA4ZQ==');
    
    xhr_data.send(null);

    console.log(xhr_data.responseXML);
    console.log("hellow world"); 

    var xmldoc = xhr_data.responseXML;
    var root_node = xmldoc.getElementsByTagName('ThingPlug')[0].getElementsByTagName('result_code')[0];

    console.log(root_node.firstChild.data);

    // var xmldoc = httpRequest.responseXML;
    // var root_node = xmldoc.getElementsByTagName("root")[0];
    // alert(root_node.firstChild.data);

    
})();
</script>

</body>

