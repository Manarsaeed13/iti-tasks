
const espressoDrinks = [
  {
    name: "Espresso",
    price: "$3.50",
    desc: "Rich, bold, and perfectly extracted",
    image: "images/demo/espresso.jpg",
    popular: false
  },
  {
    name: "Cortado",
    price: "$4.50",
    desc: "Equal parts espresso and steamed milk",
    image: "images/demo/cortado.jpg",
    popular: false
  },
  {
    name: "Cappuccino",
    price: "$5.00",
    desc: "Velvety foam with a double shot",
    image: "images/demo/cappuccino.jpg",
    popular: true
  }
];

function createMenuItem(drink) {
  const item = document.createElement("div");
  item.className = "menu-item";

  const imageWrap = document.createElement("div");
  imageWrap.className = "item-image-wrap";

  const img = document.createElement("img");
  img.className = "item-image";
  img.src = drink.image;
  img.alt = drink.name;
 

  imageWrap.appendChild(img);

  const body = document.createElement("div");
  body.className = "item-body";

  const top = document.createElement("div");
  top.className = "item-top";

  const name = document.createElement("h4");
  name.className = "item-name";
  name.textContent = drink.name;

  const price = document.createElement("span");
  price.className = "item-price";
  price.textContent = drink.price;

  top.appendChild(name);
  top.appendChild(price);

  const desc = document.createElement("p");
  desc.className = "item-desc";
  desc.textContent = drink.desc;

  body.appendChild(top);
  body.appendChild(desc);

  if (drink.popular) {
    const tag = document.createElement("span");
    tag.className = "tag-popular";
    tag.textContent = "Popular";
    body.appendChild(tag);
  }

  item.appendChild(imageWrap);
  item.appendChild(body);

  item.addEventListener("mouseenter", () => {
    item.classList.add("hovered");
  });

  item.addEventListener("mouseleave", () => {
    item.classList.remove("hovered");
  });

  return item;
}

function renderMenuSection() {
  const container = document.getElementById("menu-section");

  const title = document.createElement("h2");
  title.className = "category-title";
  title.textContent = "Espresso Drinks";

  const subtitle = document.createElement("p");
  subtitle.className = "category-subtitle";
  subtitle.textContent = "Crafted with our signature house blend";

  const grid = document.createElement("div");
  grid.className = "menu-grid";

  
   // 3 cards
  espressoDrinks.forEach(drink => {
    grid.appendChild(createMenuItem(drink));
  });

  container.appendChild(title);
  container.appendChild(subtitle);
  container.appendChild(grid);
}

document.addEventListener("DOMContentLoaded", renderMenuSection);
