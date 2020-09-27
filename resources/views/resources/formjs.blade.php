<script type="text/javascript">

  function check(elem) {
    var url = 'http://localhost/messenger/'+elem.value;
      location.replace(url);
  }

  var accCounter = 1;

  var btnCounter = 1;


  function addBtn(btnId,botid){

    btnCounter += 1;
    accCounter += 1; 

    $.post("http://localhost/messenger/api/bot/form/element/button",
      {
        counter: 'action'+btnCounter,
        actcounter: 'action'+accCounter,
        hidshow: 'url'+accCounter,
        botid: botid
      },
      function(data, status){
        document.getElementById(btnId).innerHTML +=  data;
      });

  }


  function accElem(){

    accCounter += 1; 

    if (accCounter > 5) {
      alert('Cannot add more element');
      return;
    }

    $.post("http://localhost/messenger/api/bot/form/generic",
      {
        counter: accCounter,
        actcounter: 'action'+accCounter,
        hidshow: 'url'+accCounter
      },
      function(data, status){
        document.getElementById("accordionExample275").innerHTML +=  data;
      });
  }

  function showPostback(el,btnId,urlId){

    if (el.value == 'postback') {
      document.getElementById(urlId).style.display = "none";
      document.getElementById(btnId).style.display = "block";
    } else {
      document.getElementById(urlId).style.display = "block";
      document.getElementById(btnId).style.display = "none";
    }
    
  }

</script>