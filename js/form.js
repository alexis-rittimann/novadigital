var submit= document.getElementById('submit');
submit.onclick = validate;

  function onSubmit(token) {
    alert('Votre message à été envoyé ')
  }

  function validate(event) {
    event.preventDefault();
    var check= document.getElementsByName("check[]");
    if (check[0].checked ==false && check[1].checked==false && check[2].checked==false && check[3].checked==false && check[4].checked==false  ){
        alert("Besoin non coché");
         }else {
      grecaptcha.execute();
    }
  }

 
   
