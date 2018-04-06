<!DOCTYPE HTML>

<span id="ajaxButton" style="cursor: pointer; text-decoration: underline">
  Make a request
</span>
<script type="text/javascript">
(function() {
  var httpRequest;
  // span id의 ajaxButton을 가져와 click했을 때 함수가 실행되도록 한다.
  // 그 함수는 makeRequest함수이다!
  document.getElementById("ajaxButton").onclick = function() { makeRequest('test.html'); };


  // 이제 그 호출되는 makeRequest함수를 작성한다
  // 이 함수는 url을 인자로 받는다 위에선 'test.html'로 되어있다.
  function makeRequest(url) {
    // javascript로 서버로 보내는 http request를 만들기 위해서는
    // 이런 기능을 제공하는 클래스 인스턴스가 필요하다.
    // 다음과 같이 브라우저에서 사용할 수 있는 인스턴스를 만들자.
    if (window.XMLHttpRequest) { // 모질라, 사파리 등등...
      httpRequest = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // 인터넷..
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

    // 각 브라우저에 생성된 인스턴스들이 제대로 생성되어있는지.
    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
  
  // 서버로 보낸 요청에 대한 응답을 받았을 때 어떤 동작을 할 것인지에
  // 대한 사항을 정해야한다. onreadystatechange 속성을 통해 
  // 어떤함수가 실행될지를 정한다 여기선 alertContents이다.
    httpRequest.onreadystatechange = alertContents;

    // open() 메소드의 첫 파라미터는 http 요구방식이다. GET, POST, HEAD중 하나이거나
    // 서버에서 지원하는 다른 방식이다.
    // 두 번째 파라미터는 요구할 페이지의 URL
    // 세 번째 파라미터는 요구가 비동기식으로 수행될지 결정
    // 만 파라미터가 TRUE로 설정된 경우 자바스크립트 함수의 수행은 
    // 서버로 응답을 받기 전에도 계속 진행이다.

    httpRequest.open('GET', url);

    // send() 메소드의 파라미터는 POST방식으로 요구한 경우
    // 서버로 보내고 싶은 어떠한 데이터라도 가능하다.
    // 데이터는 서버에서 쉽게 파싱할 수 있는 형식(format)이어야 한다.
    httpRequest.send();
  }


  // 이 상태값 http_request.readyState의 상태값을 본다
  // 이게 4라면 이상 없고, 응답을 받았다는 말
  // 그리고 httpRequest.status가 200이라면 이상이 없다는 말
  // else면 요구처리 하는 과정에서 문제가 발생된거
  // 예를 들어 응답상태코드가 404(not found)
  // 또는 500(Internal Server Error)이 될 수 있다.
  function alertContents() {
    if (httpRequest.readyState === 4) {
      if (httpRequest.status === 200) {
        // http_request.responsesText - 서버의 응답을 텍스트 문자열로 반환
        // http_request.responseXML - 서버의 응답을 XMLDocument 객체로 반환, 우린 자바스크립트의
        // DOM 함수들을 이용해 이 객체를 다룬다.
        alert(httpRequest.responseText);
      } else {
        alert('There was a problem with the request.');
      }
    }
  }

})();
</script>