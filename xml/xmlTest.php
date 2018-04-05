<!DOCTYPE HTML>

<span id="ajaxButton" style="cursor: pointer; text-decoration: underline">
  Make a request
</span>
<script type="text/javascript">
(function() {
  var httpRequest = false;
  document.getElementById("ajaxButton").onclick = function() { makeRequest('test.xml'); };

  function makeRequest(url) 
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      httpRequest = new XMLHttpRequest();
      if(httpRequest.overrideMimeType) {
          httpRequest.overrideMimeType('test.xml');
      }
    } else if (window.ActiveXObject) { // IE
      try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
      } 
      catch (e) {
        try {
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        catch (e) {}
      }
    }

    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', url, true);
    httpRequest.send();
  }

  function alertContents() {
    if (httpRequest.readyState === 4) {
        // HTTP 서버 응답의 상태 코드
        // 200이면 정상
      if (httpRequest.status === 200) {
        var xmldoc = http_request.responseXML;
        var root_node = xmldoc.getElementsByTagName('root').item(0);
        alert(root_node.firstChild.data);
        // alert(httpRequest.responseText);
      } else {
        alert('There was a problem with the request.');
      }                         
    }
  }
})();
</script>