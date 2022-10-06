var xhttpFood = false;
var xhttpDrinks = false;
var xhttpSweets = false;
function loadXml() {
  if (window.XMLHttpRequest) {
    xhttpFood = new XMLHttpRequest();
    xhttpDrinks = new XMLHttpRequest();
    xhttpSweets = new XMLHttpRequest();
  } else {
    if (window.ActiveXObject) {
      try {
        xhttpFood = new XMLHttpRequest("Microsoft.XMLHTTP");
      } catch (error) {
        console.log(error);
      }
    }
  }

  if (xhttpFood) {
    xhttpFood.onreadystatechange = function () {
      if (xhttpFood.readyState == 4) {
        console.log(xhttpFood.responseText);
        list_products();
      }
    };

    xhttpFood.open("GET", "./xml/food.xml");
    xhttpDrinks.open("GET", "./xml/drinks.xml");
    xhttpSweets.open("GET", "./xml/dessert.xml");
    xhttpSweets.send();
    xhttpDrinks.send();
    xhttpFood.send();
  } else {
    console.log("error");
  }
}

function list_products() {
  const xml_food = xhttpFood.responseXML;
  const get_food = xml_food.getElementsByTagName("food");
  var element = `<tr><th>Name</th><th>Price</th><th>Quantity</th><th>Category</th><th>Actions</th></tr>`;
  let xml_length = get_food.length;

  for (let index = 0; index < xml_length; index++) {
    element += `<tr>
        <td>${
          get_food[index].getElementsByTagName("name")[0].childNodes[0]
            .nodeValue
        }</td>
        <td>${
          get_food[index].getElementsByTagName("price")[0].childNodes[0]
            .nodeValue
        }</td>
         <td>${
           get_food[index].getElementsByTagName("quantity")[0].childNodes[0]
             .nodeValue
         }</td>
        <td>Food</td>
        <td>
            <button name="edit-item" value="food-${
              get_food[index].getAttributeNode("id").nodeValue
            }" class="btn-change">Change</button>
            <button name="remove-item" value="food-${
              get_food[index].getAttributeNode("id").nodeValue
            }" class="btn-remove">Remove</button>
        <td>
      </tr>`;

    document.getElementById("myTable").innerHTML = element;
  }
  const xml_drinks = xhttpDrinks.responseXML;
  const get_drinks = xml_drinks.getElementsByTagName("drink");
  let xml_drinksLength = get_drinks.length;

  for (let index = 0; index < xml_drinksLength; index++) {
    element += `<tr>
        <td>${
          get_drinks[index].getElementsByTagName("name")[0].childNodes[0]
            .nodeValue
        }</td>
        <td>${
          get_drinks[index].getElementsByTagName("price")[0].childNodes[0]
            .nodeValue
        }</td>
         <td>${
           get_drinks[index].getElementsByTagName("quantity")[0].childNodes[0]
             .nodeValue
         }</td>
        <td>Drinks</td>
        <td>
            <button name="edit-item"value="drinks-${
              get_drinks[index].getAttributeNode("id").nodeValue
            }" class="btn-change">Change</button>
            <button name="remove-item" value="drinks-${
              get_drinks[index].getAttributeNode("id").nodeValue
            }" class="btn-remove">Remove</button>
        <td>
      </tr>`;

    document.getElementById("myTable").innerHTML = element;
  }

  const xml_sweets = xhttpSweets.responseXML;
  const get_sweets = xml_sweets.getElementsByTagName("dessert");
  let xml_sweetsLength = get_sweets.length;
  for (let index = 0; index < xml_sweetsLength; index++) {
    element += `<tr>
        <td>${
          get_sweets[index].getElementsByTagName("name")[0].childNodes[0]
            .nodeValue
        }</td>
        <td>${
          get_sweets[index].getElementsByTagName("price")[0].childNodes[0]
            .nodeValue
        }</td>
         <td>${
           get_sweets[index].getElementsByTagName("quantity")[0].childNodes[0]
             .nodeValue
         }</td>
        <td>Sweets</td>
        <td>
            <button name="edit-item" value="sweets-${
              get_sweets[index].getAttributeNode("id").nodeValue
            }" class="btn-change">Change</button>
            <button name="remove-item" value="sweets-${
              get_sweets[index].getAttributeNode("id").nodeValue
            }" class="btn-remove">Remove</button>
        <td>
      </tr>`;

    document.getElementById("myTable").innerHTML = element;
  }
}

window.onload = loadXml;
