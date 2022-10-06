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
        buttons_func();
        mouse_func();
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

function buttons_func() {
  var show_food = document.getElementById("showFood");
  show_food.addEventListener("click", only_food);

  var show_sweets = document.getElementById("showSweets");
  show_sweets.addEventListener("click", only_sweets);

  var show_drinks = document.getElementById("showDrinks");
  show_drinks.addEventListener("click", only_drinks);

  var show_all = document.getElementById("showAll");
  show_all.addEventListener("click", list_products);
}

function list_products() {
  const xml_food = xhttpFood.responseXML;
  const get_food = xml_food.getElementsByTagName("food");
  var element = `<div class="for-description" id="forDescription">
                        Hello this is a sample description
                    </div>`;
  let xmlFood_length = get_food.length;

  for (let index = 0; index < xmlFood_length; index++) {
    element += ` <div class="product" id="hover_food${index}">
                    <img src="./images/${
                      get_food[index].getElementsByTagName("image")[0]
                        .childNodes[0].nodeValue
                    }" class="product-image" alt="" />
                    <h3>${
                      get_food[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }</h3>
                    <p>Price: ${
                      get_food[index].getElementsByTagName("price")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <p>Availabe: ${
                      get_food[index].getElementsByTagName("quantity")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <button name="add-to-cart" type="submit"
                    value='Food-${
                      get_food[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }-${
      get_food[index].getElementsByTagName("price")[0].childNodes[0].nodeValue
    }'>Order Now</button>
                </div>`;
    document.getElementById("bodyContainer").innerHTML = element;
  }

  const xml_drinks = xhttpDrinks.responseXML;
  const get_drinks = xml_drinks.getElementsByTagName("drink");
  let xmlDrink_length = get_drinks.length;

  for (let index = 0; index < xmlDrink_length; index++) {
    element += ` <div class="product" id="hover_drinks${index}">
                    <img src="./images/${
                      get_drinks[index].getElementsByTagName("image")[0]
                        .childNodes[0].nodeValue
                    }" class="product-image" alt="" />
                    <h3>${
                      get_drinks[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }</h3>
                    <p>Price: ${
                      get_drinks[index].getElementsByTagName("price")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <p>Availabe: ${
                      get_drinks[index].getElementsByTagName("quantity")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <button name="add-to-cart" type="submit"
                    value='Drinks-${
                      get_drinks[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }-${
      get_drinks[index].getElementsByTagName("price")[0].childNodes[0].nodeValue
    }'>Order Now</button>
                </div>`;
    document.getElementById("bodyContainer").innerHTML = element;
  }

  const xml_sweets = xhttpSweets.responseXML;
  const get_sweets = xml_sweets.getElementsByTagName("dessert");
  let xmlSweets_length = get_sweets.length;

  for (let index = 0; index < xmlSweets_length; index++) {
    element += ` <div class="product" id="hover_sweets${index}">
                    <img src="./images/${
                      get_sweets[index].getElementsByTagName("image")[0]
                        .childNodes[0].nodeValue
                    }" class="product-image" alt="" />
                    <h3>${
                      get_sweets[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }</h3>
                    <p>Price: ${
                      get_sweets[index].getElementsByTagName("price")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <p>Availabe: ${
                      get_sweets[index].getElementsByTagName("quantity")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <button name="add-to-cart" type="submit"
                    value='Sweets-${
                      get_sweets[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }-${
      get_sweets[index].getElementsByTagName("price")[0].childNodes[0].nodeValue
    }'>Order Now</button>
                </div>`;
    document.getElementById("bodyContainer").innerHTML = element;
  }
  mouse_func();
}

function mouse_func() {
  var descriptionContainer = document.getElementById("forDescription");
  const xml_food = xhttpFood.responseXML;
  const get_food = xml_food.getElementsByTagName("food");

  for (let index = 0; index < get_food.length; index++) {
    document
      .getElementById("hover_food" + index)
      .addEventListener("mouseover", function () {
        descriptionContainer.style.display = "block";
        descriptionContainer.innerHTML =
          get_food[index].getElementsByTagName(
            "description"
          )[0].childNodes[0].nodeValue;
      });

    document
      .getElementById("hover_food" + index)
      .addEventListener("mouseout", function () {
        descriptionContainer.style.display = "none";
      });
  }

  const xml_drinks = xhttpDrinks.responseXML;
  const get_drinks = xml_drinks.getElementsByTagName("drink");

  for (let index = 0; index < get_drinks.length; index++) {
    document
      .getElementById("hover_drinks" + index)
      .addEventListener("mouseover", function () {
        descriptionContainer.style.display = "block";
        descriptionContainer.innerHTML =
          get_drinks[index].getElementsByTagName(
            "description"
          )[0].childNodes[0].nodeValue;
      });

    document
      .getElementById("hover_drinks" + index)
      .addEventListener("mouseout", function () {
        descriptionContainer.style.display = "none";
      });
  }

  const xml_sweets = xhttpSweets.responseXML;
  const get_sweets = xml_sweets.getElementsByTagName("dessert");

  for (let index = 0; index < get_sweets.length; index++) {
    document
      .getElementById("hover_sweets" + index)
      .addEventListener("mouseover", function () {
        descriptionContainer.style.display = "block";
        descriptionContainer.innerHTML =
          get_sweets[index].getElementsByTagName(
            "description"
          )[0].childNodes[0].nodeValue;
      });

    document
      .getElementById("hover_sweets" + index)
      .addEventListener("mouseout", function () {
        descriptionContainer.style.display = "none";
      });
  }
}

function only_food() {
  const xml_food = xhttpFood.responseXML;
  const get_food = xml_food.getElementsByTagName("food");
  var element = `<div class="for-description" id="forDescription">
                        Hello this is a sample description
                    </div>`;
  let xmlFood_length = get_food.length;

  for (let index = 0; index < xmlFood_length; index++) {
    element += ` <div class="product" id="hover_food${index}">
                    <img src="./images/${
                      get_food[index].getElementsByTagName("image")[0]
                        .childNodes[0].nodeValue
                    }" class="product-image" alt="" />
                    <h3>${
                      get_food[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }</h3>
                    <p>Price: ${
                      get_food[index].getElementsByTagName("price")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <p>Availabe: ${
                      get_food[index].getElementsByTagName("quantity")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <button name="add-to-cart" type="submit">Order Now</button>
                </div>`;
    document.getElementById("bodyContainer").innerHTML = element;
  }
  var descriptionContainer = document.getElementById("forDescription");
  for (let index = 0; index < get_food.length; index++) {
    document
      .getElementById("hover_food" + index)
      .addEventListener("mouseover", function () {
        descriptionContainer.style.display = "block";
        descriptionContainer.innerHTML =
          get_food[index].getElementsByTagName(
            "description"
          )[0].childNodes[0].nodeValue;
      });

    document
      .getElementById("hover_food" + index)
      .addEventListener("mouseout", function () {
        descriptionContainer.style.display = "none";
      });
  }
}

function only_drinks() {
  const xml_drinks = xhttpDrinks.responseXML;
  const get_drinks = xml_drinks.getElementsByTagName("drink");
  let xmlDrink_length = get_drinks.length;
  var element = `<div class="for-description" id="forDescription">
                        Hello this is a sample description
                    </div>`;
  for (let index = 0; index < xmlDrink_length; index++) {
    element += ` <div class="product" id="hover_drinks${index}">
                    <img src="./images/${
                      get_drinks[index].getElementsByTagName("image")[0]
                        .childNodes[0].nodeValue
                    }" class="product-image" alt="" />
                    <h3>${
                      get_drinks[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }</h3>
                    <p>Price: ${
                      get_drinks[index].getElementsByTagName("price")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <p>Availabe: ${
                      get_drinks[index].getElementsByTagName("quantity")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <button name="add-to-cart" type="submit">Order Now</button>
                </div>`;
    document.getElementById("bodyContainer").innerHTML = element;
  }
  var descriptionContainer = document.getElementById("forDescription");
  for (let index = 0; index < get_drinks.length; index++) {
    document
      .getElementById("hover_drinks" + index)
      .addEventListener("mouseover", function () {
        descriptionContainer.style.display = "block";
        descriptionContainer.innerHTML =
          get_drinks[index].getElementsByTagName(
            "description"
          )[0].childNodes[0].nodeValue;
      });

    document
      .getElementById("hover_drinks" + index)
      .addEventListener("mouseout", function () {
        descriptionContainer.style.display = "none";
      });
  }
}

function only_sweets() {
  const xml_sweets = xhttpSweets.responseXML;
  const get_sweets = xml_sweets.getElementsByTagName("dessert");
  let xmlSweets_length = get_sweets.length;
  var element = `<div class="for-description" id="forDescription">
                        Hello this is a sample description
                    </div>`;
  for (let index = 0; index < xmlSweets_length; index++) {
    element += ` <div class="product" id="hover_sweets${index}">
                    <img src="./images/${
                      get_sweets[index].getElementsByTagName("image")[0]
                        .childNodes[0].nodeValue
                    }" class="product-image" alt="" />
                    <h3>${
                      get_sweets[index].getElementsByTagName("name")[0]
                        .childNodes[0].nodeValue
                    }</h3>
                    <p>Price: ${
                      get_sweets[index].getElementsByTagName("price")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <p>Availabe: ${
                      get_sweets[index].getElementsByTagName("quantity")[0]
                        .childNodes[0].nodeValue
                    }</p>
                    <button name="add-to-cart" type="submit">Order Now</button>
                </div>`;
  }
  document.getElementById("bodyContainer").innerHTML = element;
  var descriptionContainer = document.getElementById("forDescription");
  for (let index = 0; index < get_sweets.length; index++) {
    document
      .getElementById("hover_sweets" + index)
      .addEventListener("mouseover", function () {
        descriptionContainer.style.display = "block";
        descriptionContainer.innerHTML =
          get_sweets[index].getElementsByTagName(
            "description"
          )[0].childNodes[0].nodeValue;
      });

    document
      .getElementById("hover_sweets" + index)
      .addEventListener("mouseout", function () {
        descriptionContainer.style.display = "none";
      });
  }
}

window.onload = loadXml;
