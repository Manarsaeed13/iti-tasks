  //----------1---------
//  fetch("https://dummyjson.com/products")//promise 
//  .then(Response =>{
//    if(!Response.ok){
//     throw new Error("faild")
//    }
//    return Response.json();


//  })

//  .then(result=>{
// //   console.log(typeof(result));
//   console.log(result);
  
  

//  })

//  .catch(error =>{ 
//     console.log("error");
    
//  })




//-----------------1-----------------

// const promise=fetch("https://dummyjson.com/products")//promise 
// console.log(promise);
// promise .then(response =>response.json())
// .then(data=>{console.log(data);})
// .catch(error=>{
//     console.log(error)
    
// })



//-----------------2-------------------
async function showproducts(){

    try{

     const response=await fetch( "https://dummyjson.com/products "); //await
     if(!response.ok){
        throw new Error("faild");
        
     }

     const result=await response.json();
     console.log(result);
     
    }
    catch (error){console.log(error);}
    

}
showproducts();
    






// 3

var products = []

var cart = []

var topbar = document.createElement("div")
topbar.classList.add("topbar")

var siteTitle = document.createElement("h1")
siteTitle.classList.add("site-title")
siteTitle.innerText = "Products"

var cartIcon = document.createElement("div")
cartIcon.classList.add("cart-icon")
cartIcon.innerText = "🛒"

var cartCount = document.createElement("span")
cartCount.classList.add("cart-count")
cartCount.innerText = "0"

cartIcon.appendChild(cartCount)
topbar.append(siteTitle, cartIcon)
document.body.appendChild(topbar)

var container = document.createElement("div")
container.classList.add("container")
document.body.appendChild(container)

var backdrop = document.createElement("div")
backdrop.classList.add("backdrop")

var cartSidebar = document.createElement("div")
cartSidebar.classList.add("cart-sidebar")

var cartTitle = document.createElement("h2")
cartTitle.innerText = "Cart"

var cartList = document.createElement("div")
cartList.classList.add("cart-list")

var cartTotal = document.createElement("div")
cartTotal.classList.add("cart-total")

var closeCartBtn = document.createElement("button")
closeCartBtn.classList.add("close-btn")
closeCartBtn.innerText = "Close"

cartSidebar.append(cartTitle, cartList, cartTotal, closeCartBtn)
document.body.append(backdrop, cartSidebar)

function createProduct(product)
{
    let card = document.createElement("div")
    card.classList.add("card")

    let cardImage = document.createElement("img")
    cardImage.classList.add("imag")
    cardImage.src = product.thumbnail

    let title = document.createElement("p")
    title.classList.add("title")
    title.innerText = product.title

    let price = document.createElement("p")
    price.classList.add("price")
    price.innerText = product.price + "$"

    let brand = document.createElement("p")
    brand.classList.add("brand")
    brand.innerText = product.brand ? product.brand : ""

    let category = document.createElement("p")
    category.classList.add("category")
    category.innerText = product.category

    let rating = document.createElement("p")
    rating.classList.add("rating")
    rating.innerText = "rating: " + product.rating

    let description = document.createElement("p")
    description.classList.add("description")
    description.innerText = product.description

    let cardButton = document.createElement("button")
    cardButton.innerText = "Add To Cart"

    cardButton.addEventListener("click", () => {
        cart.push(product)
        cartCount.innerText = cart.length
    })

    card.append(cardImage, title, price, brand, category, rating, description, cardButton)
    container.appendChild(card)
}

function renderCart()
{
    cartList.innerHTML = ""

    if (cart.length === 0)
    {
        let emptyMsg = document.createElement("p")
        emptyMsg.classList.add("empty-msg")
        emptyMsg.innerText = "Cart is empty"
        cartList.appendChild(emptyMsg)
        cartTotal.innerText = ""
        return
    }

    let total = 0

    cart.forEach((product) => {
        let row = document.createElement("div")
        row.classList.add("cart-row")

        let name = document.createElement("span")
        name.innerText = product.title

        let price = document.createElement("span")
        price.innerText = product.price + "$"

        row.append(name, price)
        cartList.appendChild(row)

        total += product.price
    })

    cartTotal.innerText = "Total: " + total + "$"
}

cartIcon.addEventListener("click", () => {
    renderCart()
    cartSidebar.classList.add("open")
    backdrop.classList.add("open")
})

closeCartBtn.addEventListener("click", () => {
    cartSidebar.classList.remove("open")
    backdrop.classList.remove("open")
})

backdrop.addEventListener("click", () => {
    cartSidebar.classList.remove("open")
    backdrop.classList.remove("open")
})

async function loadProducts()
{
    try
    {
        const response = await fetch("https://dummyjson.com/products")
        if (!response.ok)
        {
            throw new Error("failed to fetch products")
        }

        const data = await response.json()
        products = data.products

        products.forEach((product) => {
            createProduct(product)
        })
    }
    catch (error)
    {
        console.log(error)
    }
}

loadProducts()