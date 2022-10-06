var xhttpCart = false;
function loadXml() {
  if (window.XMLHttpRequest) {
    xhttpCart = new XMLHttpRequest();
  } else {
    if (window.ActiveXObject) {
      try {
        xhttpCart = new XMLHttpRequest("Microsoft.XMLHTTP");
      } catch (error) {
        console.log(error);
      }
    }
  }

  if (xhttpCart) {
    xhttpCart.onreadystatechange = function () {
      if (xhttpCart.readyState == 4) {
        console.log(xhttpCart.responseText);
        list_cart();
      }
    };

    xhttpCart.open("GET", "./xml/cart.xml");
    xhttpCart.send();
  } else {
    console.log("error");
  }
}

function list_cart() {
  const xml_cart = xhttpCart.responseXML;
  const get_items = xml_cart.getElementsByTagName("item");
  var element = `<tr><th>Product Name</th><th>Product Price</th><th>Product Category</th><th>Actions</th></tr>`;
  let xml_length = get_items.length;

  for (let index = 0; index < xml_length; index++) {
    element += `<tr>
        <td>${
          get_items[index].getElementsByTagName("name")[0].childNodes[0]
            .nodeValue
        }</td>
        <td>${
          get_items[index].getElementsByTagName("price")[0].childNodes[0]
            .nodeValue
        }</td>
        <td>${
          get_items[index].getElementsByTagName("category")[0].childNodes[0]
            .nodeValue
        }</td>
        <td>
            <button name="edit-item" value="${
              get_items[index].getAttributeNode("id").nodeValue
            }" class="btn-change">Change</button>
            <button name="remove-item" value="${
              get_items[index].getAttributeNode("id").nodeValue
            }" class="btn-remove">Remove</button>
        <td>
      </tr>`;

    document.getElementById("myTable").innerHTML = element;
  }
}
window.onload = loadXml;
