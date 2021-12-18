<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вывод товаров при нажатии на кнопку</title>
</head>
<body>
  <div class="app">

  </div>


<button id="btn1">Press me!</button>


<script>

    let btn1 = document.getElementById('btn1');
    btn1.onclick = getProduct;

async function getProduct(){

let num = 0;


let response = await fetch(`GetProduct.php?count=${num}`);

if (response.ok) { // если HTTP-статус в диапазоне 200-299
  // получаем тело ответа (см. про этот метод ниже)
  let json = await response.json();
  let output = '';
 
  for(let i in json){
    output +=`<div> 
    <h2>${json[i].name}</h2>
    <span>${json[i].price} </span>
    </div>`
  }
  document.querySelector('.app').innerHTML = output;
} else {
  alert("Ошибка HTTP: " + response.status);
}


}



</script>  
</body>
</html>